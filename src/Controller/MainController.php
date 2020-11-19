<?php

namespace App\Controller;

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
    public function homepage(): Response
    {
        return $this->render('homepage.html.twig');
    }
    /**
     * @Route("/portofolio", name="portofolio")
     */
    public function portofolio(): Response
    {
        return $this->render('portofolio.html.twig');
    }
    /**
     * @Route("/exercices", name="training")
     */
    public function training(): Response
    {
        return $this->render('training.html.twig');
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
    public function blog(): Response
    {
        return $this->render('blog.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactPage()
    {

        // if(isset($_POST) && isset($_POST['submit'])) {
 
        //     $email = (new Email())
        //         ->from($_POST['email'])
        //         ->to('mariecharton21@gmail.com')
        //         ->subject('Message de ' .$_POST['name'])
        //         ->html
        //         (
        //         "<p><strong> Contenu du message : </strong> " . $_POST['message']. "</p>
        //         <p> Adresse mail de l'expediteur : " . $_POST['email'] . "</p>"
        //         );                
        //     $mailer->send($email);
            
        //     // $this->addFlash('success', "Votre message a bien été envoyé ! ");
        //     return $this->redirectToRoute('contact');
            
    
        // }  

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
