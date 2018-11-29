<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AffichageRechercheController extends AbstractController
{
    /**
     * @Route("/affichage/recherche", name="affichage_recherche")
     */
    public function index()
    {
      $conn = $this->getDoctrine()->getEntityManager()->getConnection();

    $sql = '
        SELECT Eleve_Nom, Eleve_Prenom FROM Eleves WHERE Eleve_Nom LIKE :recherche OR Eleve_Prenom LIKE :recherche;
        ';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['recherche' => $_POST["requete"]]);

    // returns an array of arrays (i.e. a raw data set)
    $result = $stmt->fetchAll();
        return $this->render('recherche/index.html.twig', [
            'controller_name' => 'RechercheController',
            'resultats' => $result,
        ]);
    }
}
