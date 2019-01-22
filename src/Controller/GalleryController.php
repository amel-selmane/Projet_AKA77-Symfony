<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Form\GalleryType;
use App\Repository\GalleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Commun\Upload;
    /**
     * @Route("/admin/galerie")
     */
class GalleryController extends AbstractController
{
    /**
     * @Route("/", name="adminGalerie", methods={"GET"})
     */
    public function index(GalleryRepository $galleryRepository): Response
    {
        
        return $this->render('gallery/index.html.twig', [
            'galleries' => $galleryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouvelle", name="gallery_new", methods={"GET","POST"})
     */
    public function new(Request $request, Upload $objMonUpload): Response
    {
        $gallery = new Gallery();
        $form = $this->createForm(GalleryType::class, $gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($gallery);
            // $entityManager->flush();

            // return $this->redirectToRoute('gallery_index');
        
            $objUploadedFile = $gallery->uploadGalleryForm;
            $dossierCible = $this->getParameter('monDossierUpload');
        

            $nomOrigine = $objMonUpload->gererUpload($objUploadedFile, $dossierCible);
            
    
            if ($nomOrigine != "") {
                $gallery->setUrlImgOriginal("assets/img/upload/$nomOrigine");
                $gallery->setDateUpdate(new \Datetime);
                $gallery->setImgLike(0);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($gallery);
                $entityManager->flush();
                $messageForm = "Votre image est maintenant publié";
            } else {
                $messageForm = "ERREUR SUR LE FICHIER UPLOAD";
            }
           return $this->redirectToRoute('adminGalerie');
        }

        return $this->render('gallery/new.html.twig', [
            'gallery' => $gallery,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gallery_show", methods={"GET"})
     */
    public function show(Gallery $gallery): Response
    {
        return $this->render('gallery/show.html.twig', [
            'gallery' => $gallery,
        ]);
    }

    /**
     * @Route("/{id}/edition", name="gallery_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gallery $gallery): Response
    {
        $form = $this->createForm(GalleryType::class, $gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gallery_index', [
                'id' => $gallery->getId(),
            ]);
        }

        return $this->render('gallery/edit.html.twig', [
            'gallery' => $gallery,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gallery_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gallery $gallery): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gallery->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gallery);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gallery_index');
    }
}
