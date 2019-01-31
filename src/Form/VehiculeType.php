<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
