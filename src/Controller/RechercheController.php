<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class RechercheController extends AbstractController
{
    /**
     * @Route("/rechercheEleve", name="rechercheEleve")
     */
    public function indexEleve()
    {

        return $this->render('recherche/searchEleve.html.twig');
    }

    /**
     * @Route("/rechercheClub", name="rechercheClub")
     */
    public function indexClub()
    {

        return $this->render('recherche/searchClub.html.twig');
    }
}
