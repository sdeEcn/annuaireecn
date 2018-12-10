<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 07/12/2018
 * Time: 19:26
 */

namespace App\Controller;


use App\Entity\Eleve;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
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
     * @IsGranted("ROLE_USER")
     * @Route("/user/monprofil",name="app.user.own")
     */
    public function myProfil():Response
    {

        $user = $this->getUser();

        return $this->render('user/monprofil.html.twig',array('user' => $user));
    }

    /**
     * @Route("/user/{id}",name="app.user")
     */
    public function user($id):Response
    {
        $repository = $this->getDoctrine()->getRepository(Eleve::class);

        if($this->getUser()!=null){
            if($this->getUser()->getId()==$id){
                return new RedirectResponse("/user/monprofil");
            }
        }
        $user = $repository->find($id);

        return $this->render('default/user.html.twig',array('user' => $user));
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/Parametres/",name="app.user.params")
     */
    public function params():Response
    {

        return $this->render("user/parametres.html.twig");
    }

}