<?php

namespace App\Entity;

use App\Repository\PlatformRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlatformRepository::class)
 */
class Platform
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    //! Relation

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Exercice", mappedBy="platform")
     */
    private $exercices;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of exercices
     */ 
    public function getExercices()
    {
        return $this->exercices;
    }

    /**
     * Set the value of exercices
     *
     * @return  self
     */ 
    public function setExercices($exercices)
    {
        $this->exercices = $exercices;

        return $this;
    }
}
