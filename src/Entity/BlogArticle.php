<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogArticleRepository")
 */
class BlogArticle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleArticle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlArticle;

    /**
     * @ORM\Column(type="text")
     */
    private $contentArticle;

    /**
     * @ORM\Column(type="integer")
     */
    private $likeArticle;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModification;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CategoryBlog")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categoryArticle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Artists")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idArtist;

    public function getId() : ? int
    {
        return $this->id;
    }

    public function getTitleArticle() : ? string
    {
        return $this->titleArticle;
    }

    public function setTitleArticle(string $titleArticle) : self
    {
        $this->titleArticle = $titleArticle;

        return $this;
    }

    public function getUrlArticle() : ? string
    {
        return $this->urlArticle;
    }

    public function setUrlArticle(string $urlArticle) : self
    {
        $this->urlArticle = $urlArticle;

        return $this;
    }

    public function getContentArticle() : ? string
    {
        return $this->contentArticle;
    }

    public function setContentArticle(string $contentArticle) : self
    {
        $this->contentArticle = $contentArticle;

        return $this;
    }

    public function getLikeArticle() : ? int
    {
        return $this->likeArticle;
    }

    public function setLikeArticle(int $likeArticle) : self
    {
        $this->likeArticle = $likeArticle;

        return $this;
    }

    public function getDateModification() : ? \DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(\DateTimeInterface $dateModification) : self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    public function getCategoryArticle() : ? CategoryBlog
    {
        return $this->categoryArticle;
    }

    public function setCategoryArticle(? CategoryBlog $categoryArticle) : self
    {
        $this->categoryArticle = $categoryArticle;

        return $this;
    }

    public function getIdArtist() : ? Artists
    {
        return $this->idArtist;
    }

    public function setIdArtist(? Artists $idArtist) : self
    {
        $this->idArtist = $idArtist;

        return $this;
    }
}
