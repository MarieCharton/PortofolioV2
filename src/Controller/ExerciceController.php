<?php

namespace App\Controller;

use App\Entity\Exercice;
use App\Repository\ExerciceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/exercices")
 */
class ExerciceController extends AbstractController
{
    public function __construct(ExerciceRepository $exerciceRepository)
    {
        $this->repository = $exerciceRepository;
    }


    /**
     * @Route("/{slug}", name="solo-exercice")
     */
    public function findOneExercice(Exercice $exercice): Response
    {

        return $this->render(
            'solo-exercice.html.twig',[
                "exercice" => $exercice,
            ]       
        );
    }

}