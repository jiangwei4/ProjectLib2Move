<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserRegisterController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index2()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'UserRegisterController',
        ]);
    }

    /**
     * @Route("/user/register", name="user_register")
     */
    public function index()
    {
        return $this->render('user_register/index.html.twig', [
            'controller_name' => 'UserRegisterController',
        ]);
    }
}
