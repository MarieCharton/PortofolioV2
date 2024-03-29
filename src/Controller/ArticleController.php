<?php

namespace App\Controller;

use DateTime;
use App\Entity\Article;
use App\Entity\Hashtag;
use App\Entity\Technology;
use App\Form\ArticleType;
use App\Services\Slugger;
use App\Services\ImageUploader;
use App\Repository\ArticleRepository;
use App\Repository\HashtagRepository;
use App\Repository\CategoryRepository;
use App\Repository\ExerciceRepository;
use App\Repository\TechnologyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class ArticleController extends AbstractController
{
    //? CRUD 

    //! READ

    //Find One Article
    /**
     * @Route("/{slug}/lecture-article", name="article")
     */
    public function readOneArticle(Article $article,HashtagRepository $hashtagRepository,TechnologyRepository $technologyRepository): Response
    {

        $hashtags = $hashtagRepository->findAll();
        $technologies = $technologyRepository->findAll();
        $article_technos = $article->getTechnologies();
        $article_hashtags =$article->getHashtags();

        return $this->render(
            'solo-article.html.twig',[
                "hashtags" => $hashtags,
                "technologies" => $technologies,
                "article" => $article,
                "article_technos" => $article_technos,
                "article_hashtags" => $article_hashtags
            ]
        );
    }

    //Find articles by category
    /**
     * @Route("/{id}/lecture-hashtag", name="article_by_hashtag")
     */
    public function readArticleByHashtag(Hashtag $hashtag,TechnologyRepository $technologyRepository,HashtagRepository $hashtagRepository,Request $request,$id,ArticleRepository $articleRepository,PaginatorInterface $paginator): Response
    {
        
            $articlesByHashtag = $paginator->paginate(
            $articleRepository->findArticlesbyCategory($id),
            $request->query->getInt('page', 1),
            9
        );
        $articles = $articleRepository->findAll();
        $hashtags = $hashtagRepository->findAll();
        $technologies = $technologyRepository->findAll();

        return $this->render(
            'blog.html.twig',
            [
                "hashtags" => $hashtags,
                "hashtag" => $hashtag,
                "technologies" => $technologies,
                "articles" => $articles,
                "articlesByHashtag" => $articlesByHashtag
   
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
