<?php

namespace AppBundle\Controller;

/**
 * Description of ConsultationController
 *
 * @author irshad
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\ClinicDetails;
use AppBundle\Form\ClinicDetailsFormType;
use Symfony\Component\Filesystem\Filesystem;

class ClinicDetailsController extends Controller {

    public function indexAction() {

        $em = $this->get('doctrine')->getManager();
        $clinicDetails = new ClinicDetails();
        $form = $this->createForm(ClinicDetailsFormType::class, $clinicDetails);
        $consultationDetails = $em->getRepository('AppBundle:ClinicDetails')->findAll();
        return $this->render('AppBundle:ClinicDetails:index.html.twig', [
                    'consultationDetails' => $consultationDetails,
                    'form' => $form->createView()]);
    }

    public function saveClinicDetailsAction(Request $request) {
        $clinic = new ClinicDetails();
        $form = $this->createForm(ClinicDetailsFormType::class, $clinic);
        $form->handleRequest($request);

        $em = $this->get('doctrine')->getManager();
        $tempPath = $this->getParameter('temp_location_directory');
        $formDetails = $request->request->get('appbundle_clinicDetails');
        if (($formDetails['clinicName'] != '')) {
            $clinic->setClinicName($formDetails['clinicName']);
        }
        if (($formDetails['physicianName'] != '')) {
            $clinic->setPhysicianName($formDetails['physicianName']);
        }
        if (($formDetails['physicianContact'] != '')) {
            $clinic->setPhysicianContact($formDetails['physicianContact']);
        }
        if (($formDetails['patientFirstName'] != '')) {
            $clinic->setPatientFirstName($formDetails['patientFirstName']);
        }
        if (($formDetails['patientLastName'] != '')) {
            $clinic->setPatientLastName($formDetails['patientLastName']);
        }
        if (($formDetails['patientContact'] != '')) {
            $clinic->setPatientContact($formDetails['patientContact']);
        }
        if (($formDetails['chiefComlaint'] != '')) {
            $clinic->setChiefComlaint($formDetails['chiefComlaint']);
        }
        if (($formDetails['consultationNote'] != '')) {
            $clinic->setConsultationNote($formDetails['consultationNote']);
        }
        if (($formDetails['patientDob'] != '')) {

            $year = $formDetails['patientDob']['year'];
            $month = $formDetails['patientDob']['month'];
            $day = $formDetails['patientDob']['day'];
            $dob = $day . '/' . $month . '/' . $year;
            $dobObject = \DateTime::createFromFormat('d/m/Y', $dob);
            $clinic->setPatientDob($dobObject);
        }
        $file = $request->files->get('appbundle_clinicDetails')['logoPath'];
        if ($file != null) {
            $fileName = md5(uniqid()) . '.' . $file->getClientOriginalExtension();
            $filename_path = $this->getParameter('temp_location_directory') . '/' . $fileName;
            $file->move($this->getParameter('temp_location_directory'), $fileName);
            $clinic->setLogoPath($fileName);
        }
        $em->persist($clinic);
        $em->flush();
        $id = $clinic->getId();
        return new JsonResponse(['status' => "success",
            'msg' => "Clinic details added succesfully",
            'id' => $id]);
    }

    public function generatePdfAction(Request $request) {
        $consultationId = $request->query->get('consultationId');
        $em = $this->get('doctrine')->getManager();
        $fileSystem = new Filesystem();
        $htmlFileName = $consultationId . "_report.html";
        $tmpPath = $this->getParameter('temp_location_directory');
        $htmlFileLocation = $tmpPath . '/' . $htmlFileName;
        $consultationDetails = $em->getRepository('AppBundle:ClinicDetails')->find($consultationId);
        $clientIp = $request->getClientIp();
        if (!$fileSystem->exists($htmlFileLocation)) {
            $fileSystem->dumpFile($htmlFileLocation, '');
            $reportView = $this->renderView('AppBundle:ClinicDetails:pdf_report_template.html.twig', ['consultationDetails' => $consultationDetails, 'clientIp' => $clientIp]);
            $fileSystem->appendToFile($htmlFileLocation, $reportView);
        }

        $pdfFileName = $consultationId . "_report.pdf";
        $tmpPath = $this->getParameter('temp_location_directory');
        $pdfFileLocation = $tmpPath . '/' . $pdfFileName;
        //This linux software converts an html file to pdf
        shell_exec("/usr/bin/xvfb-run /usr/bin/wkhtmltopdf  -s A4  --footer-center [page]/[topage] {$htmlFileLocation} {$pdfFileLocation} 2>&1 &");
        $fileNameFormat = "CR_" . $consultationDetails->getPatientLastName() . "_" . $consultationDetails->getPatientFirstName() . "_" . $consultationDetails->getPatientDob()->format('d_m_Y') . ".pdf";
        if (file_exists($pdfFileLocation)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=" ' . $fileNameFormat . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($pdfFileLocation));
            flush(); // Flush system output buffer
            readfile($pdfFileLocation);
            exit();
        }
    }

    public function generateCsvAction(Request $request) {
        $em = $this->get('doctrine')->getManager();
        $consultationDetails = $em->getRepository('AppBundle:ClinicDetails')->findAll();
        $token = rand(100, 1000);
        $fileSystem = new Filesystem();

        $csvFileName = $token . "csv_report.csv";
        $tmpPath = $this->getParameter('temp_location_directory');
        $csvFileLocation = $tmpPath . '/' . $csvFileName;

        if (!file_exists($csvFileLocation)) {
            //We are beginning the iteration. So create the file and append the headers
            $handle = fopen($csvFileLocation, 'w');

            fputcsv($handle, ['Sl No','Clinic Name', 'Physician Name', 'Physician Contact', 'Patient FirstName', 'Patient LastName', 'Patient Dob', 'Patient Contact']);

            foreach ($consultationDetails as $consultationDetail) {
                $clinicName = $consultationDetail->getClinicname() ? $consultationDetail->getClinicname() : '';
                $physicianName = $consultationDetail->getPhysicianName() ? $consultationDetail->getPhysicianName() : '';
                $physicianContact = $consultationDetail->getPhysicianContact() ? $consultationDetail->getPhysicianContact() : '';
                $patientFirstName = $consultationDetail->getPatientFirstName() ? $consultationDetail->getPatientFirstName() : '';
                $patientLastName = $consultationDetail->getPatientLastName() ? $consultationDetail->getPatientLastName() : '';
                $patientDob = $consultationDetail->getPatientDob() ? $consultationDetail->getPatientDob()->format('d-m-Y') : '';
                $patientContact = $consultationDetail->getPatientContact() ? $consultationDetail->getPatientContact() : '';
               $id = $consultationDetail->getId();
                fputcsv($handle, [
                    $id,
                    $clinicName,
                    $physicianName,
                    $physicianContact,
                    $patientFirstName,
                    $patientLastName,
                    $patientDob,
                    $patientContact
                ]);
            }
        }
        if (file_exists($csvFileLocation)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=" ' . $csvFileName . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($csvFileLocation));
            flush(); // Flush system output buffer
            readfile($csvFileLocation);
            exit();
        }
    }

}
