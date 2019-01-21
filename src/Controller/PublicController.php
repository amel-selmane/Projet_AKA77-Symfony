<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

<<<<<<< HEAD
class PublicController extends AbstractController
{
    /**
     * @Route("/public", name="public")
     */
    public function index()
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }
}
=======
use Symfony\Component\HttpFoundation\Response;
use App\Repository\GalleryRepository;

class PublicController extends AbstractController
{

    /**
     * @Route("/galerie", name="galerie", methods={"GET"})
     */
    public function gallery(GalleryRepository $galleryRepository) : Response
    {

        return $this->render('public/galerie.html.twig');

    }

}
>>>>>>> origin
