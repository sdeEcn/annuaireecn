<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 07/12/2018
 * Time: 19:26
 */

namespace App\Controller;


use App\Entity\Eleve;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


/**
 * Classe définissant toutes les routes concernant des actions sur les utilisateurs non AJAX.
 * @package App\Controller
 */
class UserController extends AbstractController
{
    /**
     * Route permettant de se connecter -> redirige vers le formulaire de connexion et gère
     * les erreurs d'authentification.
     * @Route("/login",name="app.user.login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // retrouver une erreur d'authentification s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();
        // retrouver le dernier identifiant de connexion utilisé
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/connexion.html.twig', [
                'last_username' => $lastUsername,
                'error' => $error,
            ]
        );
    }

    /**
     * Route permettant de se déconnecter : redirige le visiteur vers
     * @Route("/logout", name="app.user.logout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }


    /**
     * @Route("/user/{id}",name="app.user")
     */
    public function user($id):Response
    {
        $repository = $this->getDoctrine()->getRepository(Eleve::class);

        $user = $repository->find($id);

        return $this->render('default/user.html.twig',array('user' => $user));
    }
}