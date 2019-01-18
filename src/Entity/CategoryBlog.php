<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryBlogRepository")
 */
class CategoryBlog
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
    private $nameCategoryBlog;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlImageCategoryBlog;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCategoryBlog(): ?string
    {
        return $this->nameCategoryBlog;
    }

    public function setNameCategoryBlog(string $nameCategoryBlog): self
    {
        $this->nameCategoryBlog = $nameCategoryBlog;

        return $this;
    }

    public function getUrlImageCategoryBlog(): ?string
    {
        return $this->urlImageCategoryBlog;
    }

    public function setUrlImageCategoryBlog(string $urlImageCategoryBlog): self
    {
        $this->urlImageCategoryBlog = $urlImageCategoryBlog;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }
}
