<?php

namespace App\Form;

use App\Entity\OffreLocations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OffreLocationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('TypeVehicule')
            ->add('kmMax')
            ->add('prix')
            ->add('Ville')
            ->add('Gamme')
            ->add('submit',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OffreLocations::class,
        ]);
    }
}
