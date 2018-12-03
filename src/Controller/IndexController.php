<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Eleve;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @Route("/", name="app.default.index")
     */
    public function __invoke(): Response
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/user/{id}",name="app.default.user")
     */
    public function user($id):Response
    {
        $repository = $this->getDoctrine()->getRepository(Eleve::class);

        $user = $repository->find($id);

        return $this->render('default/user.html.twig',array('user' => $user));
    }
}
