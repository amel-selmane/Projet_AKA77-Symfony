<?php

namespace App\Form;

use App\Entity\Gallery;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class GalleryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imgName', TextType::class, [
                'label' => 'Nom de l\'image',
                'attr' => ['placeholder' => "Nom de votre image"]
            ])
            ->add('urlImgOriginal', FileType::class, [
                'label' => 'Chargez votre image (UPLOAD)',
                'attr' => ['placeholder' => "Cliquez ici pour déposer votre image"]
                ]);
            // ->add('imgLike')
            //->add('dateUpdate')
            // ->add('idArtist');
    }

        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults([
                'data_class' => Gallery::class,
            ]);
        }
    }
