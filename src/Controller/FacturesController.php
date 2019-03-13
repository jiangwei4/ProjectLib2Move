<?php

namespace App\Controller;

use App\Entity\Factures;
use App\Form\FacturesType;
use App\Repository\FacturesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/factures")
 */
class FacturesController extends AbstractController
{
    /**
     * @Route("/liste", name="factures_index", methods={"GET"})
     */
    public function index(FacturesRepository $facturesRepository): Response
    {
        return $this->render('factures/index.html.twig', [
            'factures' => $facturesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="factures_new", methods={"GET","POST"})
     */
 /*   public function new(Request $request): Response
    {
        $facture = new Factures();
        $form = $this->createForm(FacturesType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirectToRoute('factures_index');
        }

        return $this->render('factures/new.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }*/

    /**
     * @Route("/{id}", name="factures_show", methods={"GET"})
     */
    public function show(Factures $facture): Response
    {
        return $this->render('factures/show.html.twig', [
            'facture' => $facture,
        ]);
    }

    /**
     * @Route("/user/show", name="user_factures_edit", methods={"GET","POST"})
     */
    public function showUser(FacturesRepository $facturesRepository): Response
    {
        $factures = $facturesRepository->findByUser($this->getUser());
        return $this->render('factures/showUser.html.twig', [
            'factures' => $factures,
        ]);
    }



    /**
     * @Route("/{id}/edit", name="factures_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Factures $facture): Response
    {
        $form = $this->createForm(FacturesType::class, $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('factures_index', [
                'id' => $facture->getId(),
            ]);
        }

        return $this->render('factures/edit.html.twig', [
            'facture' => $facture,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="factures_delete", methods={"DELETE"})
     */
 /*   public function delete(Request $request, Factures $facture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($facture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('factures_index');
    }*/
}
