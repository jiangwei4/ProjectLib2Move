<?php 
namespace App\Controller;

use App\Entity\Vehicule;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    /**
     * Matches /blog exactly
     *
     * @Route("/ajout-vehicule", name="ajout_vehicule")
     */
    public function new(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $vehicule = new Vehicule();

        $form = $this->createFormBuilder($vehicule)
            ->add('Type')
            ->add('Marque')
            ->add('Modele')
            ->add('NumeroSerie')
            ->add('Couleur')
            ->add('Matricule')
            ->add('Kilometrage')
            ->add('DateAchat')
            ->add('PrixAchat')
            ->add('Disponible')
            ->add('DateAchat', DateType::class)
            ->add('save', SubmitType::class, ['label' => 'Ajouter un véhicule'])
            ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) 
            {
                // $form->getData() holds the submitted values
                // but, the original `$task` variable has also been updated
                $task = $form->getData();

                // ... perform some action, such as saving the task to the database
                // for example, if Task is a Doctrine entity, save it!
                // $entityManager = $this->getDoctrine()->getManager();
                // $entityManager->persist($task);
                // $entityManager->flush();

                return $this->redirectToRoute('ajout_vehicule_success');
            }

        return $this->render('vehicule/ajout-vehicule.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}