<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="date")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image4;

    // ! Relations 

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="articles")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Technology", inversedBy="articles")
     */
    private $technologies;


    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->technologies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): self
    {
        $this->image4 = $image4;

        return $this;
    }

    /**
     * Get many Articles have Many Categories.
     */ 
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set many Articles have Many Categories.
     *
     * @return  self
     */ 
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get the value of technologies
     */ 
    public function getTechnologies()
    {
        return $this->technologies;
    }

    /**
     * Set the value of technologies
     *
     * @return  self
     */ 
    public function setTechnologies($technologies)
    {
        $this->technologies = $technologies;

        return $this;
    }
}
