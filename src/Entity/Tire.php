<?php

namespace App\Entity;

use App\Repository\TireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TireRepository::class)
 */
class Tire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mark;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Season::class)
     */
    private $season;

    /**
     * @ORM\ManyToOne(targetEntity=Width::class)
     */
    private $width;

    /**
     * @ORM\ManyToOne(targetEntity=Height::class)
     */
    private $height;

    /**
     * @ORM\ManyToOne(targetEntity=Diameter::class)
     */
    private $diameter;

    /**
     * @ORM\ManyToOne(targetEntity=NewUsed::class)
     */
    private $new_used;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_add;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_update;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture3;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMark(): ?string
    {
        return $this->mark;
    }

    public function setMark(string $mark): self
    {
        $this->mark = $mark;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSeason(): ?Season
    {
        return $this->season;
    }

    public function setSeason(?Season $season): self
    {
        $this->season = $season;

        return $this;
    }

    public function getWidth(): ?Width
    {
        return $this->width;
    }

    public function setWidth(?Width $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?Height
    {
        return $this->height;
    }

    public function setHeight(?Height $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getDiameter(): ?Diameter
    {
        return $this->diameter;
    }

    public function setDiameter(?Diameter $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getnew_used(): ?NewUsed
    {
        return $this->new_used;
    }

    public function getNewUsed(): ?NewUsed
    {
        return $this->new_used;
    }

    public function setNewUsed(?NewUsed $new_used): self
    {
        $this->new_used = $new_used;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->date_add;
    }

    public function setDateAdd(\DateTimeInterface $date_add): self
    {
        $this->date_add = $date_add;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(?\DateTimeInterface $date_update): self
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPicture2(): ?string
    {
        return $this->picture2;
    }

    public function setPicture2(?string $picture2): self
    {
        $this->picture2 = $picture2;

        return $this;
    }

    public function getPicture3(): ?string
    {
        return $this->picture3;
    }

    public function setPicture3(?string $picture3): self
    {
        $this->picture3 = $picture3;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
