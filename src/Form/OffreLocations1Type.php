<?php

namespace App\Form;

use App\Entity\OffreLocations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OffreLocations1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('KmMax')
            ->add('Prix')
            ->add('TypeVehicule')
            ->add('Gamme')
            ->add('Ville')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OffreLocations::class,
        ]);
    }
}
