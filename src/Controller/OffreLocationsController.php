<?php

namespace App\Controller;

use App\Entity\OffreLocations;
use App\Form\OffreLocations1Type;
use App\Repository\OffreLocationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offre/locations")
 */
class OffreLocationsController extends AbstractController
{
    /**
     * @Route("/", name="offre_locations_index", methods={"GET"})
     */
    public function index(OffreLocationsRepository $offreLocationsRepository): Response
    {
        return $this->render('offre_locations/index.html.twig', [
            'offre_locations' => $offreLocationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="offre_locations_new", methods={"GET","POST"})
     */
    public function new(Request $request, OffreLocationsRepository $offreLocationsRepository): Response
    {
        $offreLocation = new OffreLocations();
        $form = $this->createForm(OffreLocations1Type::class, $offreLocation);
        $form->handleRequest($request);
            //recuperer liste des offres 
        // $exist = $offreLocationsRepository->findBy(['Gamme'=>$request->getGamme(),'TypeVehicule'=>$request->getTypeVehicule(),'Ville'=>$request->getVille()]);
         //dump($exist);die;
        if ($form->isSubmitted() && $form->isValid()) {
          //  if(syzeof($exist) == 0 ){
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($offreLocation);
                $entityManager->flush();

                return $this->redirectToRoute('offre_locations_index');

           // }
        }

        return $this->render('offre_locations/new.html.twig', [
            'offre_location' => $offreLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offre_locations_show", methods={"GET"})
     */
    public function show(OffreLocations $offreLocation): Response
    {
        return $this->render('offre_locations/show.html.twig', [
            'offre_location' => $offreLocation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="offre_locations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OffreLocations $offreLocation): Response
    {
        $form = $this->createForm(OffreLocations1Type::class, $offreLocation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offre_locations_index', [
                'id' => $offreLocation->getId(),
            ]);
        }

        return $this->render('offre_locations/edit.html.twig', [
            'offre_location' => $offreLocation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="offre_locations_delete", methods={"DELETE"})
     */
        
    public function delete(Request $request, OffreLocations $offreLocation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offreLocation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($offreLocation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('offre_locations_index');
    }

    /**
     * @Route("/user_locations", name="userLocation", methods={"GET"})
     */
    public function userListing()
    {
        return $this->render('offre_locations/client-index.html.twig');
    }
}
