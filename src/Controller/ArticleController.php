<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\CategoryRepository;
use App\Repository\TechnologyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



/**
 * @Route("/blog")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/{slug}", name="article")
     */
    public function findOneArticle(Article $article,CategoryRepository $categoryRepository,TechnologyRepository $technologyRepository): Response
    {
        $categories = $categoryRepository->findAll();
        $technologies = $technologyRepository->findAll();
        $content = $article->getContent();
        $lignes = substr_count($content, "\n");
        dump($lignes);

        return $this->render(
            'blog.html.twig',[
                "categories" => $categories,
                "technologies" => $technologies,
                "article" => $article
            ]
        );
    }

}
