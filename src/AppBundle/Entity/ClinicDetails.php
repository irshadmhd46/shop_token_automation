<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="clinic_details")
 */
class ClinicDetails {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="clinicName", type="string")
     */
    private $clinicName;

    /**
     * @var string
     *
     * @ORM\Column(name="logoPath", type="string")
     */
    private $logoPath;

    /**
     * @var string
     *
     * @ORM\Column(name="physicianName", type="string")
     */
    private $physicianName;

    /**
     * @var string
     *
     * @ORM\Column(name="physicianContact", type="string")
     */
    private $physicianContact;

    /**
     * @var string
     *
     * @ORM\Column(name="patientFirstName", type="string")
     */
    private $patientFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="patientLastName", type="string")
     */
    private $patientLastName;

    /**
     * @var datetime
     *
     * @ORM\Column(name="patientDob", type="datetime")
     */
    private $patientDob;

    /**
     * @var string
     *
     * @ORM\Column(name="patientContact", type="string")
     */
    private $patientContact;

    /**
     * @var string
     *
     * @ORM\Column(name="chiefComlaint", type="string")
     */
    private $chiefComlaint;

    /**
     * @var string
     *
     * @ORM\Column(name="consultationNote", type="string")
     */
    private $consultationNote;

    /**
     * Set id
     *
     * @param string $id
     *
     * @return ClinicDetails
     */
    public function setId($id) {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set clinicName
     *
     * @param string $clinicName
     *
     * @return ClinicDetails
     */
    public function setClinicName($clinicName) {
        $this->clinicName = $clinicName;

        return $this;
    }

    /**
     * Get clinicName
     *
     * @return string
     */
    public function getClinicName() {
        return $this->clinicName;
    }

    /**
     * Set logoPath
     *
     * @param string $logoPath
     *
     * @return ClinicDetails
     */
    public function setLogoPath($logoPath) {
        $this->logoPath = $logoPath;

        return $this;
    }

    /**
     * Get logoPath
     *
     * @return string
     */
    public function getLogoPath() {
        return $this->logoPath;
    }

    /**
     * Set physicianName
     *
     * @param string $physicianName
     *
     * @return ClinicDetails
     */
    public function setPhysicianName($physicianName) {
        $this->physicianName = $physicianName;

        return $this;
    }

    /**
     * Get physicianName
     *
     * @return string
     */
    public function getPhysicianName() {
        return $this->physicianName;
    }

    /**
     * Set physicianContact
     *
     * @param string $physicianContact
     *
     * @return ClinicDetails
     */
    public function setPhysicianContact($physicianContact) {
        $this->physicianContact = $physicianContact;

        return $this;
    }

    /**
     * Get physicianContact
     *
     * @return string
     */
    public function getPhysicianContact() {
        return $this->physicianContact;
    }

    /**
     * Set patientFirstName
     *
     * @param string $patientFirstName
     *
     * @return ClinicDetails
     */
    public function setPatientFirstName($patientFirstName) {
        $this->patientFirstName = $patientFirstName;

        return $this;
    }

    /**
     * Get patientFirstName
     *
     * @return string
     */
    public function getPatientFirstName() {
        return $this->patientFirstName;
    }

    /**
     * Set patientLastName
     *
     * @param string $patientLastName
     *
     * @return ClinicDetails
     */
    public function setPatientLastName($patientLastName) {
        $this->patientLastName = $patientLastName;

        return $this;
    }

    /**
     * Get patientLastName
     *
     * @return string
     */
    public function getPatientLastName() {
        return $this->patientLastName;
    }

    /**
     * Set patientDob
     *
     * @param string $patientDob
     *
     * @return ClinicDetails
     */
    public function setPatientDob($patientDob) {
        $this->patientDob = $patientDob;

        return $this;
    }

    /**
     * Get patientDob
     *
     * @return string
     */
    public function getPatientDob() {
        return $this->patientDob;
    }

    /**
     * Set patientContact
     *
     * @param string $patientContact
     *
     * @return ClinicDetails
     */
    public function setPatientContact($patientContact) {
        $this->patientContact = $patientContact;

        return $this;
    }

    /**
     * Get patientContact
     *
     * @return string
     */
    public function getPatientContact() {
        return $this->patientContact;
    }

    /**
     * Set chiefComlaint
     *
     * @param string $chiefComlaint
     *
     * @return ClinicDetails
     */
    public function setChiefComlaint($chiefComlaint) {
        $this->chiefComlaint = $chiefComlaint;

        return $this;
    }

    /**
     * Get chiefComlaint
     *
     * @return string
     */
    public function getChiefComlaint() {
        return $this->chiefComlaint;
    }

    /**
     * Set consultationNote
     *
     * @param string $consultationNote
     *
     * @return ClinicDetails
     */
    public function setConsultationNote($consultationNote) {
        $this->consultationNote = $consultationNote;

        return $this;
    }

    /**
     * Get consultationNote
     *
     * @return string
     */
    public function getConsultationNote() {
        return $this->consultationNote;
    }

}
