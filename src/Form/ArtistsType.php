<?php

namespace App\Form;

use App\Entity\Artists;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            ->add('baseline')
            // ->add('droit')
            ->add('password')
            ->add('urlPageArtist')
            ->add('description')
            ->add('emailArtist')
            ->add('urlImageAvatar')
            ->add('urlSiteWebArtist')
            ->add('urlFacebookArtist')
            ->add('urlInstagramArtist')
            ->add('dateCreation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Artists::class,
        ]);
    }
}
