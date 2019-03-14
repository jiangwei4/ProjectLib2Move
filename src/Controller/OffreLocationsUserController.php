<?php

namespace App\Controller;

use App\Entity\OffreLocations;
use App\Form\OffreLocations1Type;
use App\Repository\OffreLocationsRepository;
use App\Repository\VehiculeRepository;
use App\Repository\OffreLocationsUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/user/offreLocation")
 */
class OffreLocationsUserController extends AbstractController
{
    /**
     * @Route("/", name="user_offre_location", methods={"GET"})
     */
    public function index(OffreLocationsRepository $OffreLocationsRepository, FacturesRepository $FacturesRepository)
    {
        /*$factures= $FacturesRepository->findBy(["user"=>$this->getUser()]);
        $tableau= array();
        foreach ($facture as $factures){
                
                $offreLocations = $vehiculeRepository->findBy([
                "TypeVehicule" => $facture->getLocation()->getTypeVehicule(),            
                "Ville" => $facture->getLocation()->getVille(),            
                "Gamme" =>$facture->getLocation()->getGamme()
                
                ]);
                array_push($tableau, $offreLocations);

        }
        foreach ($elem as $tableau){
       
        }
        */
        $locations = $OffreLocationsRepository->findAll();
        return $this->render('locations/index.html.twig', [
            'controller_name' => 'LocationsController',
            'locations'=>$locations,
        ]);
    }

    /**
     * @Route("/{id}/vehicules", name="offre_locations_by_vehicule_list", methods={"GET", "POST"})
     */
    public function listingVehicules(Request $request, offreLocationsUserRepository $offreLocationsUserRepository, $id,vehiculeRepository $vehiculeRepository)
    {
        $offreLocationsUser = $offreLocationsUserRepository->find($id);
        return $this->render('user_offre_locations/listing-vehicule.html.twig', [
           
            'vehicules' => $vehiculeRepository->findBy([
            "TypeVehicule" => $offreLocationsUser->getTypeVehicule(),            
            "Ville" => $offreLocationsUser->getVille(),            
            "Gamme" => $offreLocationsUser->getGamme()
            
            ]),
            "idOffreLocationLocation"=>$id,
        ]);
    }
}
?>