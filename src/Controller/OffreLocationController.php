<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\OffreLocationsType;
use App\Entity\OffreLocations;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\OffreLocationsRepository;
use App\Repository\GammeRepository;

class OffreLocationController extends Controller
{
    /**
     * @Route("/offre/location", name="offre_location")
     */

    public function index(Request $request, OffreLocationsRepository $offreLocations, GammeRepository $GammeRepository)
    {
        $offreLocations = new OffreLocations();
        $gammes = $GammeRepository->findAll();
        $form= $this->createForm(OffreLocationsType::class, $offreLocations);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $offreLocations = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($offreLocations);
            $entityManager->flush();
            
            $this->addFlash('notice','Nouvelle offre de locations enregistrée n°'.$offreLocations->getId());
            //return $this->redirectToRoute('home');
             
        }

        return $this->render('offre_location/index.html.twig', [
            'controller_name' => 'OffreLocationController',
            'form'=>$form->createView(),
        ]);
    }
}
