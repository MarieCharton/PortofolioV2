<?php

namespace App\Controller;

use DateTime;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Services\Slugger;
use App\Services\ImageUploader;
use App\Repository\ArticleRepository;
use App\Repository\HashtagRepository;
use App\Repository\TechnologyRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;




class ArticleController extends AbstractController
{
    //? CRUD 

    //! READ
    /**
     * @Route("/{slug}/lecture", name="article")
     */
    public function findOneArticle(Article $article,HashtagRepository $hashtagRepository,TechnologyRepository $technologyRepository): Response
    {

        $hashtags = $hashtagRepository->findAll();
        $technologies = $technologyRepository->findAll();
        $article_technos = $article->getTechnologies();

        return $this->render(
            'blog.html.twig',[
                "hashtags" => $hashtags,
                "technologies" => $technologies,
                "article" => $article,
                "article_technos" => $article_technos
            ]
        );
    }

    //! CREATE

    /**
    * @Route ("/create_article", name="create_article")
    * @IsGranted("ROLE_ADMIN")
    */
    public function createArticle (Request $request,Slugger $slugger,ImageUploader $imageUploader)
    {
        $article = new Article();
        
        $formArticle = $this->createForm(ArticleType::class, $article);
        
        $formArticle->handleRequest($request);
        
        
       
        if ($formArticle->isSubmitted() && $formArticle->isValid()) {

            $manager = $this->getDoctrine()->getManager();

            $file = $formArticle['image1']->getData();

            //Article Picture :
            if (!empty($file)) {

                $fileName = $imageUploader->moveAndRename($file);

                $article->setImage1($fileName);
            }

             //Set the date automatically
            $article->setCreatedAt(new DateTime());

            //Slugify the Title for the URL
            $slug = $slugger->slugify($article->getTitle());
            $article->setSlug($slug);
    
            
            $manager->persist($article);
            
            $manager->flush();

            return $this->redirectToRoute('article', ['slug' => $slug]);
        }
        

        return $this->render(
            "/layout/form/form-article.html.twig",
            [
                "formArticle" => $formArticle->createView()
            ]
        );
    }
    //! UPDATE //
    /**
     * @Route ("/updade-article/{id}",name ="update-article")
     * @IsGranted("ROLE_ADMIN")
     */
    public function updateArticle(ImageUploader $imageUploader, Request $request, $id, Article $article)
    {
        $slug = $article->getSlug();
        $image = $article->getImage1();

        $formArticle = $this->createForm(ArticleType::class, $article);
        $formArticle->handleRequest($request);

        if ($formArticle->isSubmitted() && $formArticle->isValid()) {

            $file = $formArticle['image1']->getData();

            //Article Picture :
            if (!empty($file)) {

                $fileName = $imageUploader->moveAndRename($file);

                $article->setImage1($fileName);
            } else {
                $article->setImage1($image);
            }

            $updatedAt = new DateTime();

            $article->setUpdatedAt($updatedAt);

            $manager = $this->getDoctrine()->getManager();

            $manager->flush();

            return $this->redirectToRoute('article', ['slug' => $slug]);
        }

        return $this->render(
            "/layout/form/form-article.html.twig",
            [
                "formArticle" => $formArticle->createView()
            ]
        );
    }

    //! DELETE //
    /**
     * @Route ("/delete_article/{id}",name ="delete-article")
     * @IsGranted("ROLE_ADMIN")
     */
    public function deleteArticle(Article $article)
    {

        $this->getDoctrine()->getManager()->remove($article);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('blog');
    }

}
