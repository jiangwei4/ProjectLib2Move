<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserLoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserLoginController extends Controller
{
    /**
     * @Route("/user/login", name="user_login")
     */
    public function index(AuthenticationUtils $authenticationUtils)
    {
        $user = new User();
        $form= $this->createForm(UserLoginType::class, $user);
        if($form->isSubmitted() && $form->isValid()){
            dump($form);die();
            $this->addFlash('notice','Bonjour '+$user->getPrenom());
        }
        return $this->render('user_login/index.html.twig', [
            'controller_name' => 'UserLoginController',
            'form'=> $form->createView(),
        ]);
    }

}
