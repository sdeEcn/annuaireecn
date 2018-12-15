<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 14/12/2018
 * Time: 21:10
 */

namespace App\Controller\formController;


use App\Entity\Options;
use App\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserFormController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/userform",name="app.user.form",condition="request.isXmlHttpRequest()")
     */
    public function setForm(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $optionRep = $em->getRepository(Options::class);
        $message="OK";
        $options = $optionRep->findAll();
        $error=array();
        $form = $this->createForm(UserType::class, $user, array("option" => $options));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $message="SUBMIT";
        }

        $view = $this->renderView("user/FormUser.html.twig", array("form" => $form->createView()));

        return new Response(json_encode(array("form"=>$view,"message"=>$message)));
    }
}