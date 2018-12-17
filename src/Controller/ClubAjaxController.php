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
use App\Entity\Eleve;
use App\Form\DescriptionType;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function getSubmitStatus($id): Response
    {
        $em = $this->getDoctrine()->getRepository(Club::class);
        $club = $em->find($id);
        $membres = $club->getMembres();
        $suivi = new ArrayCollection();
        $bool = 0;
        foreach ($membres as $membre) {
            if ($membre->getEleve() == $this->getUser()) {
                $bool = $membre->getStatus();
            }
        }

        return new Response(json_encode(array("suivi" => $bool)));
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/clubConnected/submitClub/{id}",name="app.clubAjax.submit", condition="request.isXmlHttpRequest()")
     */
    public function SubmitToClub($id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $clubrepo = $em->getRepository(Club::class);
        $club = $clubrepo->find($id);
        $membres = $club->getMembres();
        $suivi = new ArrayCollection();
        $finish = false;
        foreach ($membres as $membre) {
            if ($membre->getStatus() != 2) {
            }
            if ($membre->getEleve() == $this->getUser()) {
                $em->remove($membre);
                $finish = true;
                $suivi = 0;
            }
        }
        if (!$finish) {
            $relation = new ClubEleves($this->getUser(), $club);
            $em->persist($relation);
            $suivi = $relation->getStatus();

        }


        $em->flush();
        $nb = 0;
        foreach ($club->getMembres() as $membre) {
            if ($membre->getStatus() == 2) {
                $nb++;
            }
        }


        return new Response(json_encode(array("suivi" => $suivi, "nb" => $nb)));
    }

    /**
     *
     * @Route("/clubConnected/delete/{id}/{iduser}",name="app.club.ajaxdelete",condition="request.isXmlHttpRequest()")
     * @IsGranted("EDIT",subject="club")
     */
    public function delete(Club $club, $iduser)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Eleve::class);
        $user = $repo->find($iduser);
        $reponse = "ERROR";

        $membres = $club->getMembres();

        if ($club->getBureau()->getPresident() === $user) {
            $reponse = "PREZ";
        } else {
            foreach ($membres as $membre) {
                if ($membre->getEleve() === $user) {
                    $em->remove($membre);
                    $em->flush();
                    $reponse = "SUCCES";
                }
            }
        }
        $nb = $club->getMembres()->count();

        return new Response(json_encode(array('reponse' => $reponse, "nb" => $nb)));
    }

    /**
     *
     * @Route("/clubAjax/{id}",name="app.club.ajaxAccept",condition="request.isXmlHttpRequest()")
     * @IsGranted("EDIT",subject="club")
     */
    public function getDemandeMembre(Club $club)
    {
        $em = $this->getDoctrine()->getManager();
        $membres = $club->getMembres();
        $demandes = new ArrayCollection();
        foreach ($membres as $membre) {
            if ($membre->getStatus() == 1) {
                $demandes->add($membre);
            }
        }

        return $this->render("Club/acceptMembres.html.twig", array("club" => $club, "demandes" => $demandes));
    }

    /**
     * @Route("/clubAjax/confirm/{status}/{id}/{userid}",name="app.club.ajaxconfirm",condition="request.isXmlHttpRequest()")
     * @IsGranted("EDIT",subject="club")
     */
    public function confirmDemande($status, Club $club, $userid)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(Eleve::class)->find($userid);
        $message="ERROR";
        $relations = $club->getMembres();
        if ($status == 2) {
            foreach ($relations as $relation) {
                if ($relation->getEleve()->getId() == $userid) {
                    $relation->setStatus(2);
                    $message = "OK";
                }
            }
        } elseif ($status == 0) {
            foreach ($relations as $relation) {
                if ($relation->getEleve()->getId() == $userid) {
                    $em->remove($relation);
                    $message = "DELETE";
                }
            }
        }

        $nb=0;
        $nbdemandes= 0;
        foreach ($relations as $relation){
            if($relation->getStatus() ==2){
                $nb++;
            }elseif ($relation->getStatus() ==1){
                $nbdemandes++;
            }
        }


        $em->flush();

        return new Response(json_encode(array("message"=>$message,"nom"=>$user->getNom(),
            "prenom"=>$user->getPrenom(),"nb"=>$nb,"nbdemandes"=>$nbdemandes)));

    }

    /**
     * @Route("/clubAjax/description/{id}",name="app.clubAjax.descriptionmodif",condition="request.isXmlHttpRequest()")
     * @IsGranted("EDIT",subject="club")
     */
    public function modifDescription(Club $club,Request $request){
        $em= $this->getDoctrine()->getManager();
        $form= $this->createForm(DescriptionType::class,$club);
        $message = "OK";

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $message = "SUBMIT";
        }

        $view  =$this->renderView("Club/Descriptionform.html.twig",array("form"=>$form->createView()));

        $desc = $club->getDescription();

        return new Response(json_encode(array("view"=>$view,"descrip"=>$desc,"message"=>$message)));

    }
}