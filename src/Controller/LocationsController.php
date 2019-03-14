<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\OffreLocationsRepository;
use App\Entity\OffreLocations;
use App\Entity\Factures;
use App\Entity\Locations;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Repository\GammeRepository;
use App\Controller\OffreLocationsUserController;
use App\Repository\OffreLocationsUserRepository;
use App\Repository\VehiculeRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AjouterLocationType;
use Symfony\Component\Validator\Constraints\Date;

// use phpDocumentor\Reflection\Location;

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
     * @Route("/user/rent_vehicule/{idVehicule}/{idOffreLocationLocation}", name="user_vehicule_to_rent", methods={"GET", "POST"})
     */
    public function userVehiculeToRent(Request $request, EntityManagerInterface $entityManager,VehiculeRepository $VehiculeRepository,  offreLocationsUserRepository $offreLocationsUserRepository, $idVehicule, $idOffreLocationLocation)
    {        
        $location = new Locations();   
        $form = $this->createForm(AjouterLocationType::class, $location);
        $offreLocationsUser = $offreLocationsUserRepository->find($idOffreLocationLocation);
        $prix = $offreLocationsUser->getPrix();
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $dateDebut = $location->getdateDebut();
            $dateFin = $location->getdateFin();
            $difference = $dateDebut->diff($dateFin);
            $difference = $difference->format('%a');

            $location->setVehicule($VehiculeRepository->find($idVehicule));
            $facture = new Factures();
            $facture->setUser($this->getUser());
            $facture->setLocation($location);
            $facture->setDate(new \DateTime());
            $facture->setPrix($difference*$prix);
            $location->setFactures($facture);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($location);
            $entityManager->persist($facture);
            $entityManager->flush();
            $this->addFlash('notice','Votre véhicule a été réservé. Vous pouvez consulter votre facture dans la page de gestion des facture');
            return $this->redirectToRoute('home');
        }

        return $this->render('locations/user-vehicule-to-rent.html.twig', [
            'location' => $location,
            'form' => $form->createView(),
        ]);
    }
}
