<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ListeVilleController extends Controller
{
    /**
     * @Route("/liste/ville", name="liste_ville")
     */
    public function index()
    {
        return $this->render('liste_ville/index.html.twig', [
            'controller_name' => 'ListeVilleController',
        ]);
    }
}
