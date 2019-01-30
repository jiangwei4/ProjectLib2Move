<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OffreLocationController extends AbstractController
{
    /**
     * @Route("/offre/location", name="offre_location")
     */
    public function index()
    {
        return $this->render('offre_location/index.html.twig', [
            'controller_name' => 'OffreLocationController',
        ]);
    }
}
