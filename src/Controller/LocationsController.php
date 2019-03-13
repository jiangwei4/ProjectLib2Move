<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreLocationsRepository;
use App\Entity\OffreLocations;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Repository\GammeRepository;
use App\Controller\OffreLocationsUserController;
use App\Repository\OffreLocationsUserRepository;
use App\Repository\VehiculeRepository;
use Symfony\Component\HttpFoundation\Request;

class LocationsController extends AbstractController
{
    /**
     * @Route("/locations", name="locations")
     */
    public function index(OffreLocationsRepository $OffreLocationsRepository, GammeRepository $GammeRepository )
    {
        $locations = $OffreLocationsRepository->findAll();
        $gammes = $GammeRepository->findAll();
        return $this->render('locations/index.html.twig', [
            'controller_name' => 'LocationsController',
            'locations'=>$locations,
        ]);
    }
    /**
     * @Route("/locations/choix/{id}", name="locations_choix")
     * @ParamConverter("OffreLocations", options={"mapping"={"id"="id"}})
     */

    public function choix( EntityManagerInterface $entityManager,VehiculeRepository $VehiculeRepository)
    {
        //on affecte une offre a l'utilisateur 
        $voiture = $VehiculeRepository->findAll();
        $this->addFlash('notice', 'offre de location choisi');
        //return $this->redirectToRoute('user/offreLocation');
        return $this->render('locations/ListeVoiture.html.twig', [
            'controller_name' => 'LocationsController',
            'voiture'=>$voiture,
        ]);
        //return $this->redirectToRoute('locations');
    }
    /**
     * @Route("/user/rent_vehicule/{idVehicule}", name="user_vehicule_to_rent", methods={"GET", "POST"})
     */
    public function userVehiculeToRent(Request $request, EntityManagerInterface $entityManager,VehiculeRepository $VehiculeRepository, $idVehicule)
    {        
        return $this->render('locations/user-vehicule-to-rent.html.twig', []);
    }
}
