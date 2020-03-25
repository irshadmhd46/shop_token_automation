<?php

namespace AppBundle\Controller;

/**
 * Description of ShopMasterController
 *
 * @author fredy
 */
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\ShopMaster;
use AppBundle\Form\ShopMasterType;

class ShopMasterController extends Controller {

    public function indexAction() {

        $shop = new ShopMaster();
        $form = $this->createForm(ShopMasterType::class, $shop);

        return $this->render('AppBundle:ShopMaster:index.html.twig', [
                    'form' => $form->createView()]);
    }

    public function saveAction(Request $request) {

        $shop = new ShopMaster();
        $form = $this->createForm(ShopMasterType::class, $shop);
        $form->handleRequest($request);
        $em = $this->get('doctrine')->getManager();
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($shop);
            $em->flush();
        }
        return new JsonResponse(['status' => "success"]);
    }

}
