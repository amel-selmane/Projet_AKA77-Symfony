<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GalleryRepository")
 */
class Gallery
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
    private $imgName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlImgOriginal;

    /**
     * @ORM\Column(type="integer")
     */
    private $imgLike;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateUpdate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Artists")
     */
    private $idArtist;

    public function __construct()
    {
        $this->idArtist = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgName(): ?string
    {
        return $this->imgName;
    }

    public function setImgName(string $imgName): self
    {
        $this->imgName = $imgName;

        return $this;
    }

    public function getUrlImgOriginal(): ?string
    {
        return $this->urlImgOriginal;
    }

    public function setUrlImgOriginal(string $urlImgOriginal): self
    {
        $this->urlImgOriginal = $urlImgOriginal;

        return $this;
    }

    public function getImgLike(): ?int
    {
        return $this->imgLike;
    }

    public function setImgLike(int $imgLike): self
    {
        $this->imgLike = $imgLike;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(\DateTimeInterface $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * @return Collection|Artists[]
     */
    public function getIdArtist(): Collection
    {
        return $this->idArtist;
    }

    public function addIdArtist(Artists $idArtist): self
    {
        if (!$this->idArtist->contains($idArtist)) {
            $this->idArtist[] = $idArtist;
        }

        return $this;
    }

    public function removeIdArtist(Artists $idArtist): self
    {
        if ($this->idArtist->contains($idArtist)) {
            $this->idArtist->removeElement($idArtist);
        }

        return $this;
    }
}
