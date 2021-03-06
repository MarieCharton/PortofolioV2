<?php

namespace App\Controller;

use ReCaptcha\ReCaptcha;
use Symfony\Component\Mime\Email;
use App\Repository\ArticleRepository;
use App\Repository\HashtagRepository;
use App\Repository\ProjectRepository;
use App\Repository\ExerciceRepository;
use App\Repository\PlatformRepository;
use App\Repository\TechnologyRepository;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ArticleRepository $articleRepository,ProjectRepository $projectRepository,ExerciceRepository $exerciceRepository): Response
    {
        $projects= $projectRepository->findAll();
        $lastArticles = $articleRepository->findLastArticles();
        $lastExercices = $exerciceRepository->findLastExercices();

        
        return $this->render('homepage.html.twig',[

            "projects" =>$projects,
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
     * @Route("/about-me", name="about-me")
     */
    public function aboutMe(): Response
    {
        return $this->render('about-me.html.twig');
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


        // Gestion du Recaptcha GOOGLE
        // Secret key
        $captcha = "6LekypMaAAAAAHwl6yyrvx43TkjJLcPFnQw2EWNv";

        if(isset($_POST['g-recaptcha-response']))
          $captcha=$_POST['g-recaptcha-response'];

        if(!$captcha){
            $this->addFlash('error', "Veuillez cliquer sur la case 'Je ne suis pas un robot ! ");
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LekypMaAAAAAHwl6yyrvx43TkjJLcPFnQw2EWNv&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        if($response['success'] == true)
        {
            $this->addFlash('success', "Votre message a bien été envoyé ! ");
            
            $mailer->send($email);
        }

            
            // $this->addFlash('success', "Votre message a bien été envoyé ! ");
            
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
