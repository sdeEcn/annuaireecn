<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 12/12/2018
 * Time: 16:53
 */

namespace App\Controller;




use App\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClubController extends AbstractController
{
    /**
     * @Route("club/{id}/{nom}",name="app.club.default")
     */
    public function index($id,$nom){
        $em= $this->getDoctrine()->getManager();
        $clubem=$em->getRepository(Club::class);
        $club = $clubem->find($id);

        return $this->render("default/club.html.twig",array("club"=>$club));
    }
}