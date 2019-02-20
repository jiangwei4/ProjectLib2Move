<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreLocationsRepository;
use App\Entity\OffreLocations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ModifierOffreLocationsController extends AbstractController
{
    /**
     * @Route("/modifier/offre/locations", name="modifier_offre_locations")
     */
    public function index(OffreLocationsRepository $OffreLocationsRepository)
    {
        $locations = $OffreLocationsRepository->findAll();
        return $this->render('locations/index.html.twig', [
            'controller_name' => 'LocationsController',
            'locations'=>$locations,
        ]);
    }
    /**
     * @Route("/modifier/offre/locations/remove/{id}", name="modifier_offre_locations_remove")
     * @ParamConverter("OffreLocations", options={"mapping"={"id"="id"}})
     */

    public function remove(OffreLocations $OffreLocations, EntityManagerInterface $entityManager)
    {
        //on remove l appartenance de l utilisateur a toutes ses videos
        /*foreach ($user->getMovies() as $movie) {
            $user->removeMovie($movie);
        }*/
        $entityManager->remove($OffreLocations);
        $entityManager->flush();
        $this->addFlash('notice', 'offre de location bien supprimé');
        return $this->redirectToRoute('modifier_offre_locations');
    }
    /**
     * @Route("/modifier/offre/locations/edit/{id}", name="modifier_offre_locations_edit")
     * @ParamConverter("OffreLocations", options={"mapping"={"id"="id"}})
     */

    public function edit(Request $request, EntityManagerInterface $entityManager,
                    OffreLocationsRepository $OffreLocationsRepository, int $id)
    {
        $OffreLocations = $OffreLocationsRepository->find($id);
        $form =$this->createForm(ModifierOffreLocations::class,$OffreLocations);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($OffreLocations);
            $entityManager->flush();
            $this->addFlash('notice', 'Changement(s) effectué(s)!');
            return $this->redirectToRoute('modifier_offre_locations');
        }
        return $this->render('modifier_offre_locations/editindex.html.twig', [
            'controller_name' => 'EdituserController',
            'form' => $form->createView(),
        ]);
    }
}
