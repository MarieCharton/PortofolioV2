<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TechnologyRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=TechnologyRepository::class)
 */
class Technology
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Article", mappedBy="technologies")
     */
    private $articles;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", mappedBy="technologies")
     */
    private $projects;

    

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->project = new ArrayCollection();
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
     * Get the value of articles
     */ 
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set the value of articles
     *
     * @return  self
     */ 
    public function setArticles($articles)
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * Get the value of projects
     */ 
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set the value of projects
     *
     * @return  self
     */ 
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }
}
