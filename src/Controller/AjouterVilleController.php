<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VilleRepository;
use App\Form\AjouterVilleType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Ville;

class AjouterVilleController extends AbstractController
{
    /**
     * @Route("/ajouter/ville", name="ajouter_ville")
     */
    public function index(Request $request, VilleRepository $villeRepository)
    {
        $ville = new Ville();
        $form = $this->createForm(AjouterVilleType::class,$ville);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $ville = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ville);
            $entityManager->flush();
            
            $this->addFlash('notice','Nouvelle ville enregistrée '.$ville->getVille());
            return $this->redirectToRoute('home');

        }
        return $this->render('ajouter_ville/index.html.twig', [
            'controller_name' => 'AjouterVilleController',
            'form' => $form->createView(),
        ]);
    }
}
