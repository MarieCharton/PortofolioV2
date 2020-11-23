<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/exercices")
 */
class ExerciceController extends AbstractController
{
    /**
     * @Route("/nomdelexercice", name="solo-exercice")
     */
    public function soloproject(): Response
    {
        return $this->render('solo-exercice.html.twig');
    }

}