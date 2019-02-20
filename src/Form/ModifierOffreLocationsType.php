<?php

namespace App\Form;

use App\Entity\OffreLocations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifierOffreLocationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeVehicule')
            ->add('kmMax')
            ->add('prix')
            ->add('name')
            ->add('ville')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OffreLocations::class,
        ]);
    }
}
