<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/portofolio")
 */
class ProjectController extends AbstractController
{
    /**
     * @Route("/nomduprojet", name="solo-project")
     */
    public function soloproject(): Response
    {
        return $this->render('solo-project.html.twig');
    }

}
