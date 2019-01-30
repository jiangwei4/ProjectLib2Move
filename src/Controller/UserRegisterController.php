<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegisterType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserRegisterController extends Controller
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
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder, UserRepository $userRepository)
    {
        
        $user = new User();
        $form = $this->createForm(UserRegisterType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $password = $passwordEncoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            
            $this->addFlash('notice','Nouveau utilisateur enregistré '.$user->getPrenom());
            return $this->redirectToRoute('home');

        }
        return $this->render('user_register/index.html.twig', [
            'controller_name' => 'UserRegisterController',
            'form' => $form->createView(),
        ]);
    }
}
