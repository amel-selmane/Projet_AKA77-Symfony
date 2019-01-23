<?php

namespace App\Controller;

use App\Repository\GalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{

    /**
     * @Route("/galerie", name="galerie", methods={"GET"})
     */
    public function gallery(GalleryRepository $galleryRepository): Response
    {

        $listeGallery = $galleryRepository->findBy([], ["dateUpdate" => "DESC"]);

        return $this->render('public/galerie.html.twig', [
            'gallerys' => $listeGallery,
        ]);
    }

    /**
     * @Route("/ajax", name="ajaxgalerie", methods={"GET"})
     */
    public function nbLike(Request $request)
    {
        // $table = $request->get("table");

        // if ($table != "") {
        //     // $table = $request->get("table");
            $id = $request->get("id");
            $nbLike = $request->get("nbLike");

        //     if ($table == "gallery") {
        //         $nomLike = "img_like";
        //     } else {
        //         $nomLike = "like_article";
        //     }}


        $entityManager = $this->getDoctrine()->getManager();
        $img = $entityManager->getRepository(Gallery::class)->find($id);

        $img->setImgLike($nbLike);
  
            dump($img);
        $entityManager->flush();

        // $strSQL="UPDATE $table SET $nomLike = $nbLike WHERE id = $idImage;";

    }
}
