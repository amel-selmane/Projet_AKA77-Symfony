<?php

namespace App\Controller;


use App\Repository\BlogArticleRepository;
use App\Repository\GalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index(Request $request, GalleryRepository $galleryRepository, BlogArticleRepository $articleRepository, SerializerInterface $serializer)
    {

        $table = $request->get("table");
        $tabAsso = [];

        switch ($table) {
            case "gallery":
                $id = $request->get("id");
                $entityManager = $this->getDoctrine()->getManager();
                $entite = $galleryRepository->find($id);
                $nbLike = $entite->getImgLike() + 1;
                $entite->setImgLike($nbLike);
                $entityManager->flush();
                $tabImage = $galleryRepository->listeImage();
                $tabAsso["tabImage"] = $tabImage;
                break;

            case "article":
                $id = $request->get("id");
                $entityManager = $this->getDoctrine()->getManager();
                $entite = $galleryRepository->find($id);
                $nbLike = $entite->getLikeArticle();
                $entite->setLikeArticle($nbLike);
                $entityManager->flush();
                $tabArticle = $galleryRepository->listeArticle();
                $tabAsso["tabArticle"] = $tabArticle;
                break;

        }

        $tabAssoJson = $serializer->serialize(
            $tabAsso,
            "json"
        );

        return JsonResponse::fromJsonString($tabAssoJson);

    }
}
