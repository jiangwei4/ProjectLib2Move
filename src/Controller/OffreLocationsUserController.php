<?php

namespace App\Controller;

use App\Entity\OffreLocations;
use App\Form\OffreLocations1Type;
use App\Repository\OffreLocationsRepository;
use App\Repository\OffreLocationsUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("user/offre-location")
 */
class OffreLocationsUserController extends AbstractController
{
    /**
     * @Route("/", name="user_offre_location", methods={"GET"})
     */
    public function index(OffreLocationsRepository $offreLocationsRepository): Response
    {
        return $this->render('user_offre_locations/index.html.twig', [
            'offre_locations' => $offreLocationsRepository->findAll(),
        ]);
    }
   
    /**
     * @Route("/{id}/vehicules", name="offre_locations_by_vehicule_list", methods={"GET", "POST"})
     */
    public function listingVehicules(Request $request, offreLocationsUserRepository $offreLocationsUserRepository, $id)
    {
        return $this->render('user_offre_locations/listing-vehicule.html.twig', [
            'offreLocationsUser' => $offreLocationsUserRepository->find($id),
        ]);
    }
}
?>