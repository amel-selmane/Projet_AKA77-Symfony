<?php

namespace App\Controller;

use App\Repository\GalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index(Request $request, GalleryRepository $galleryRepository)
    {
        // $table = $request->get("table");

// if ($table != "") {
        //     // $table = $request->get("table");
        $id = $request->get("id");
// $nbLike = $request->get("nbLike");

//     if ($table == "gallery") {
        //         $nomLike = "img_like";
        //     } else {
        //         $nomLike = "like_article";
        //     }}

        $entityManager = $this->getDoctrine()->getManager();
        $img = $galleryRepository->find($id);
        $nbLike = $img->getImgLike("imgLike") + 1;
        $img->setImgLike($nbLike);

// dump($img->getImgLike("imgLike"));
        $entityManager->flush();

// $strSQL="UPDATE $table SET $nomLike = $nbLike WHERE id = $idImage;";

        return $this->render('ajax/index.html.twig', [
        'controller_name' => 'AjaxController',
        ]);
    //    return JsonResponse::create($data, 200)
    // ->setSharedMaxAge(300);

    }
}
