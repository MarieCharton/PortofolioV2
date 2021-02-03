<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\ExerciceRepository;
use App\Repository\HashtagRepository;
use App\Repository\PlatformRepository;
use App\Repository\ProjectRepository;
use App\Repository\TechnologyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ArticleRepository $articleRepository,ProjectRepository $projectRepository,ExerciceRepository $exerciceRepository): Response
    {
        $lastArticles = $articleRepository->findLastArticles();
        $lastExercices = $exerciceRepository->findLastExercices();
        $project1 = $projectRepository->find(1);
        $project2 = $projectRepository->find(2);
        $project3 = $projectRepository->find(3);
        $project4 = $projectRepository->find(4);
        $project5 = $projectRepository->find(5);
        
        return $this->render('homepage.html.twig',[
            "project1" => $project1,
            "project2" => $project2,
            "project3" => $project3,
            "project4" => $project4,
            "project5" => $project5,
            "lastExercices" => $lastExercices,
            "lastArticles" => $lastArticles

        ]);
    }

    /**
     * @Route("/portofolio", name="portofolio")
     */
    public function portofolio(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();
        return $this->render(
            'portofolio.html.twig',
            ["projects" => $projects]
        );
    }

    /**
     * @Route("/exercices", name="training")
     */
    public function training(ExerciceRepository $exerciceRepository,PlatformRepository $platformRepository): Response
    {
        $exercices = $exerciceRepository->findAll();
        $platforms = $platformRepository->findAll();

        return $this->render(
            'training.html.twig',
            [
                "exercices" => $exercices,
                "platforms" => $platforms
            ]
        );
    }

    /**
     * @Route("/cv", name="cv")
     */
    public function cv(): Response
    {
        return $this->render('cv.html.twig');
    }

    /**
     * @Route("/blog", name="blog")
     */
    public function blog(HashtagRepository $hashtagRepository,TechnologyRepository $technologyRepository,ArticleRepository $articleRepository): Response
    {
        $hashtags = $hashtagRepository->findAll();
        $technologies = $technologyRepository->findAll();
        $articles = $articleRepository->findAll();
        return $this->render('blog.html.twig',
            [
                "hashtags" => $hashtags,
                "technologies" => $technologies,
                "articles" => $articles
            ]        
        );
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactPage(MailerInterface $mailer)
    {

        if(isset($_POST) && isset($_POST['submit'])) {
 
            $email = (new Email())
                ->from($_POST['email'])
                ->to('mariecharton21@gmail.com')
                ->subject('Message de ' .$_POST['name'])
                ->html
                (
                "<p><strong> Contenu du message : </strong> " . $_POST['message']. "</p>
                <p> Adresse mail de l'expediteur : " . $_POST['email'] . "</p>"
                );                
            $mailer->send($email);
            
            $this->addFlash('success', "Votre message a bien été envoyé ! ");
            
            return $this->redirectToRoute('contact');
            
    
        }  

        return $this->render('contact.html.twig');
    }


    /**
     * @Route("/mentions-legales", name="mentions")
     */
    public function mentions(): Response
    {
        return $this->render('mentions-legales.html.twig');
    }
}
