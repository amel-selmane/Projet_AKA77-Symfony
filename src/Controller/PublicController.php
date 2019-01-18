<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GalleryRepository;


class PublicController extends AbstractController
{


    /**
     * @Route("/galerie", name="galerie")
     */
    public function gallery(GalleryRepository $galleryRepository) : Response
    {
        /*
        $listeGallery = $galleryRepository->findBy([], ["DatePublication" => "DESC"]);
        dump($listeGallery);
        return $this->render('public/gallery.html.twig', [
            'gallerys' => $listeGallery,
        ]);
         */

    }




}



