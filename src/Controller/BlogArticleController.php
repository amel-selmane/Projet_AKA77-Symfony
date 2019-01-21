<?php

namespace App\Controller;

use App\Entity\BlogArticle;
use App\Form\BlogArticleType;
use App\Repository\BlogArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/blog")
 */
class BlogArticleController extends AbstractController
{
    /**
     * @Route("/", name="adminBlog", methods={"GET"})
     */
    public function index(BlogArticleRepository $blogArticleRepository): Response
    {
        return $this->render('blog_article/index.html.twig', [
            'blog_articles' => $blogArticleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau", name="blog_article_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $blogArticle = new BlogArticle();
        $form = $this->createForm(BlogArticleType::class, $blogArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blogArticle);
            $entityManager->flush();

            return $this->redirectToRoute('blog_article_index');
        }

        return $this->render('blog_article/new.html.twig', [
            'blog_article' => $blogArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_article_show", methods={"GET"})
     */
    public function show(BlogArticle $blogArticle): Response
    {
        return $this->render('blog_article/show.html.twig', [
            'blog_article' => $blogArticle,
        ]);
    }

    /**
     * @Route("/{id}/edition", name="blog_article_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BlogArticle $blogArticle): Response
    {
        $form = $this->createForm(BlogArticleType::class, $blogArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_article_index', [
                'id' => $blogArticle->getId(),
            ]);
        }

        return $this->render('blog_article/edit.html.twig', [
            'blog_article' => $blogArticle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blog_article_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BlogArticle $blogArticle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blogArticle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blogArticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blog_article_index');
    }
}
