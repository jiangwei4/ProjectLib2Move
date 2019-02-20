<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreLocationsRepository;

class LocationsController extends AbstractController
{
    /**
     * @Route("/locations", name="locations")
     */
    public function index(OffreLocationsRepository $OffreLocationsRepository)
    {
        $locations = $OffreLocationsRepository->findAll();
        return $this->render('locations/index.html.twig', [
            'controller_name' => 'LocationsController',
            'locations'=>$locations,
        ]);
    }
}
