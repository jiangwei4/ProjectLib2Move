<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreLocationsRepository;
use App\Entity\OffreLocations;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
    /**
     * @Route("/locations/choix/{id}", name="locations_choix")
     * @ParamConverter("OffreLocations", options={"mapping"={"id"="id"}})
     */
    public function choix( EntityManagerInterface $entityManager)
    {
        //on affecte une offre a l'utilisateur 
        $this->addFlash('notice', 'offre de location choisi');
        return $this->redirectToRoute('locations');
    }
}
