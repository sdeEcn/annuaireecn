<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 12/12/2018
 * Time: 19:30
 */

namespace App\Controller;


use App\Entity\Club;
use App\Entity\ClubEleves;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClubAjaxController extends AbstractController
{
    /**
     * Permet de récupérer le status du suivi de l'utilisateur pour afficher la bonne valeur du bouton après le
     * chargement de la page
     * @IsGranted("ROLE_USER")
     * @Route("/ClubConnected/getSubmit/{id}",name="app.clubAjax.getsubmit", condition="request.isXmlHttpRequest()")
     */
    public function getSubmitStatus($id):Response
    {
        $em= $this->getDoctrine()->getRepository(Club::class);
        $club=$em->find($id);
        $membres = $club->getMembres();
        $suivi = new ArrayCollection();
        $bool=0;
        foreach ($membres as $membre){
            if($membre->getEleve()==$this->getUser()){
                $bool=$membre->getStatus();
            }
        }

        return new Response(json_encode(array("suivi"=>$bool)));
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/UserConnected/submitClub/{id}",name="app.clubAjax.submit", condition="request.isXmlHttpRequest()")
     */
    public function SubmitToClub($id):Response{
        $em= $this->getDoctrine()->getManager();
        $clubrepo =$em ->getRepository(Club::class);
        $club=$clubrepo->find($id);
        $membres = $club->getMembres();
        $suivi = new ArrayCollection();
        $finish=false;
        foreach ($membres as $membre){
            if($membre->getEleve()==$this->getUser()){
                $em->remove($membre);
                $finish=true;
                $suivi=0;
            }
        }
        if(!$finish){
            $relation = new ClubEleves($this->getUser(),$club);
            $em->persist($relation);
            $suivi = $relation->getStatus();
        }

        $em->flush();

        return new Response(json_encode(array("suivi"=>$suivi)));
    }
}