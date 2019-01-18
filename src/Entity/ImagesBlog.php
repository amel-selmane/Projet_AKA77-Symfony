<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesBlogRepository")
 */
class ImagesBlog
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
    private $nameImgBlog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlImageBlog;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePublication;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BlogArticle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idArticle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameImgBlog(): ?string
    {
        return $this->nameImgBlog;
    }

    public function setNameImgBlog(string $nameImgBlog): self
    {
        $this->nameImgBlog = $nameImgBlog;

        return $this;
    }

    public function getUrlImageBlog(): ?string
    {
        return $this->urlImageBlog;
    }

    public function setUrlImageBlog(string $urlImageBlog): self
    {
        $this->urlImageBlog = $urlImageBlog;

        return $this;
    }

    public function getDatePublication(): ?\DateTimeInterface
    {
        return $this->datePublication;
    }

    public function setDatePublication(\DateTimeInterface $datePublication): self
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    public function getIdArticle(): ?BlogArticle
    {
        return $this->idArticle;
    }

    public function setIdArticle(?BlogArticle $idArticle): self
    {
        $this->idArticle = $idArticle;

        return $this;
    }
}
