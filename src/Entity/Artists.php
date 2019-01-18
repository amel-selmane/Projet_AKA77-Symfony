<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArtistsRepository")
 */
class Artists
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
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $baseline;

    /**
     * @ORM\Column(type="integer")
     */
    private $droit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlPageArtist;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $emailArtist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $urlImageAvatar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlSiteWebArtist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlFacebookArtist;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $urlInstagramArtist;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(?string $baseline): self
    {
        $this->baseline = $baseline;

        return $this;
    }

    public function getDroit(): ?int
    {
        return $this->droit;
    }

    public function setDroit(int $droit): self
    {
        $this->droit = $droit;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUrlPageArtist(): ?string
    {
        return $this->urlPageArtist;
    }

    public function setUrlPageArtist(string $urlPageArtist): self
    {
        $this->urlPageArtist = $urlPageArtist;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEmailArtist(): ?string
    {
        return $this->emailArtist;
    }

    public function setEmailArtist(string $emailArtist): self
    {
        $this->emailArtist = $emailArtist;

        return $this;
    }

    public function getUrlImageAvatar(): ?string
    {
        return $this->urlImageAvatar;
    }

    public function setUrlImageAvatar(string $urlImageAvatar): self
    {
        $this->urlImageAvatar = $urlImageAvatar;

        return $this;
    }

    public function getUrlSiteWebArtist(): ?string
    {
        return $this->urlSiteWebArtist;
    }

    public function setUrlSiteWebArtist(?string $urlSiteWebArtist): self
    {
        $this->urlSiteWebArtist = $urlSiteWebArtist;

        return $this;
    }

    public function getUrlFacebookArtist(): ?string
    {
        return $this->urlFacebookArtist;
    }

    public function setUrlFacebookArtist(?string $urlFacebookArtist): self
    {
        $this->urlFacebookArtist = $urlFacebookArtist;

        return $this;
    }

    public function getUrlInstagramArtist(): ?string
    {
        return $this->urlInstagramArtist;
    }

    public function setUrlInstagramArtist(?string $urlInstagramArtist): self
    {
        $this->urlInstagramArtist = $urlInstagramArtist;

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
