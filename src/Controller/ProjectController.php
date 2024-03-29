<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/portofolio")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/{slug}", name="solo-project")
     */
    public function findOneProject(Project $project): Response
    {
        $technologies = $project->getTechnologies();
        
        return $this->render(
            'solo-project.html.twig',[
                "project" => $project,
                "technologies" => $technologies
            ]
        
        );
    }

}
