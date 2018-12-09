<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 07/12/2018
 * Time: 20:34
 */

namespace App\Controller;


use App\Entity\Eleve;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserAjaxController extends AbstractController
{
    /**
     * Permet de récupérer le status du suivi de l'utilisateur pour afficher la bonne valeur du bouton après le
     * chargement de la page
     * @IsGranted("ROLE_USER")
     * @Route("/UserConnected/getSubmit/{id}",name="app.userAjax.getsubmit", condition="request.isXmlHttpRequest()")
     */
    public function getSubmitStatus($id):Response
    {
        $em= $this->getDoctrine()->getRepository(Eleve::class);
        $user=$em->find($id);
        $suivi = $user->getMessuiveurs()->contains($this->getUser());
        return new Response(json_encode(array("suivi"=>$suivi)));
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/UserConnected/submitUser/{id}",name="app.userAjax.submit", condition="request.isXmlHttpRequest()")
     */
    public function SubmitTo($id):Response{
        $em= $this->getDoctrine()->getManager();
        $userrepo =$em ->getRepository(Eleve::class);
        $user=$userrepo->find($id);
        if($user->getMessuiveurs()->contains($this->getUser())){
            $user->removeSuiveur($this->getUser());
        }else{
            $user->addSuiveur($this->getUser());
        }

        $em->flush();
        $suivi = $user->getMessuiveurs()->contains($this->getUser());

        return new Response(json_encode(array("suivi"=>$suivi)));
    }

}