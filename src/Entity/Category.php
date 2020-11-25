<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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

    // ! Relations
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Article", mappedBy="categories")
     */
    private $articles;


    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }



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

    /**
     * Get many Categories have Many Articles.
     */ 
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set many Categories have Many Articles.
     *
     * @return  self
     */ 
    public function setArticles($articles)
    {
        $this->articles = $articles;

        return $this;
    }
}
