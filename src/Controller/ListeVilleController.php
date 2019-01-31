<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VilleRepository;
use App\Form\ModifierVilleType;
use App\Entity\Ville;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

    /**
     * @Route("/liste/ville/remove/{id}", name="liste_ville_remove")
     * @ParamConverter("ville", options={"mapping"={"id"="id"}})
     */
    public function remove(Ville $ville, EntityManagerInterface $entityManager)
    {
        //on remove l appartenance de l utilisateur a toutes ses videos
        /*foreach ($user->getMovies() as $movie) {
            $user->removeMovie($movie);
        }*/
        $entityManager->remove($ville);
        $entityManager->flush();
        $this->addFlash('notice', 'ville supprimée!');
        return $this->redirectToRoute('liste_ville');
    }
    /**
     * @Route("/liste/ville/edit/{id}", name="liste_ville_edit")
     * @ParamConverter("ville", options={"mapping"={"id"="id"}})
     */
    public function edit(Request $request, EntityManagerInterface $entityManager,
                         VilleRepository $villeRepository, int $id)
    {
        $ville = $villeRepository->find($id);
        $form =$this->createForm(ModifierVilleType::class,$ville);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($ville);
            $entityManager->flush();
            $this->addFlash('notice', 'Changement(s) effectué(s)!');
            return $this->redirectToRoute('liste_ville');
        }
        return $this->render('liste_ville/editindex.html.twig', [
            'controller_name' => 'EditVilleController',
            'form' => $form->createView(),
        ]);
    }
}
