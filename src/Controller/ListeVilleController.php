<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VilleRepository;

class ListeVilleController extends Controller
{
    /**
     * @Route("/liste/ville", name="liste_ville")
     */
    public function index(VilleRepository $villeRepository)
    {
        $villes = $villeRepository->findAll();
        return $this->render('liste_ville/index.html.twig', [
            'controller_name' => 'ListeVilleController',
            'villes' => $villes,
        ]);
    }
}
