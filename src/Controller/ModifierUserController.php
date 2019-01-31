<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\ModifierUserType;

class ModifierUserController extends Controller
{
    /**
     * @Route("/modifier/user", name="modifier_user")
     */
    public function index(Request $request, EntityManagerInterface $entityManager)
    {
        $user = $this->getUser();
        $form = $this->createForm(ModifierUserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entityManager->flush();
            $this->addFlash('notice','les changements ont bien été éffectués');
            return $this->redirectToRoute('home');
        }
        return $this->render('modifier_user/index.html.twig', [
            'controller_name' => 'ModifierUserController',
            'form' => $form->createView(),
        ]);
    }
}
