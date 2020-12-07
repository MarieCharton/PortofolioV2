<?php

namespace App\Controller;

use App\Entity\Exercice;
use App\Entity\Platform;
use App\Form\ExerciceType;
use App\Services\Slugger;
use App\Services\ImageUploader;
use App\Repository\ExerciceRepository;
use App\Repository\PlatformRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class ExerciceController extends AbstractController
{
    public function __construct(ExerciceRepository $exerciceRepository)
    {
        $this->repository = $exerciceRepository;
    }


    //? CRUD 

    //! READ
    // Find One exercice
    /**
     * @Route("/{slug}/lecture-exercice", name="exercice")
     */
    public function readOneExercice(Exercice $exercice): Response
    {
        return $this->render(
            'solo-exercice.html.twig',[
                "exercice" => $exercice,
            ]       
        );
    }
    //Find exercices by platform
    /**
     * @Route("/{id}/lecture-platform", name="exercice_by_plaform")
     */
    public function readExercicesByPlatform(Platform $platform,PlatformRepository $platformRepository,Request $request,$id,ExerciceRepository $exerciceRepository,PaginatorInterface $paginator): Response
    {
        
            $exercicesByPlatform = $paginator->paginate(
            $exerciceRepository->findExercicesbyPlatform($id),
            $request->query->getInt('page', 1),
            9
        );
        $exercices = $exerciceRepository->findAll();
        $platforms = $platformRepository->findAll();

        return $this->render(
            'training.html.twig',
            [
                "exercices" => $exercices,
                "platforms" => $platforms,
                "platform" => $platform,
                "exercicesByPlatform" => $exercicesByPlatform
            ]
        );
    }


    //! CREATE

    /**
    * @Route ("/create_exercice", name="create_exercice")
    * @IsGranted("ROLE_ADMIN")
    */
    public function createExercice (Request $request,Slugger $slugger,ImageUploader $imageUploader)
    {
        $exercice = new Exercice();
        
        $formExercice = $this->createForm(ExerciceType::class, $exercice);
        
        $formExercice->handleRequest($request);
        
        if ($formExercice->isSubmitted() && $formExercice->isValid()) {

            $manager = $this->getDoctrine()->getManager();

            $file1 = $formExercice['target']->getData();
            $file2 = $formExercice['score']->getData();
            $file3 = $formExercice['code']->getData();

            //Exercice Picture :
            if (!empty($file1)) {
                
                $fileName = $imageUploader->moveAndRename($file1);
                $exercice->setTarget($fileName);

                    if (!empty($file2)) {
                        $fileName2 = $imageUploader->moveAndRename($file2);
                        $exercice->setScore($fileName2);

                            if (!empty($file3)) {
                                $fileName3 = $imageUploader->moveAndRename($file3);
                                $exercice->setCode($fileName3);
                            }
                            
                    }else {
                        $exercice->setScore("empty");
                        $exercice->setCode("empty");
                    }
                    


            }

            //Slugify the Title for the URL
            $slug = $slugger->slugify($exercice->getName());
            $exercice->setSlug($slug);
    
            
            $manager->persist($exercice);
            
            $manager->flush();

            return $this->redirectToRoute('exercice', ['slug' => $slug]);
        }
        

        return $this->render(
            "/layout/form/form-exercice.html.twig",
            [
                "formExercice" => $formExercice->createView()
            ]
        );
    }
   //! UPDATE //
    /**
     * @Route ("/updade-exercice/{id}",name ="update_exercice")
     * @IsGranted("ROLE_ADMIN")
     */
    public function updateExercice(ImageUploader $imageUploader, Request $request, $id, Exercice $exercice)
    {
        $slug = $exercice->getSlug();

        // $image1 = $exercice->getTarget();
        // $image2 = $exercice->getScore();
        // $image3= $exercice->getCode();

        $formExercice = $this->createForm(ExerciceType::class, $exercice);
        $formExercice->handleRequest($request);

        if ($formExercice->isSubmitted() && $formExercice->isValid()) {

            $file1 = $formExercice['target']->getData();
            $file2 = $formExercice['score']->getData();
            $file3 = $formExercice['code']->getData();

            //Exercice Picture :
            if (!empty($file1)) {
                
                $fileName = $imageUploader->moveAndRename($file1);
                $exercice->setTarget($fileName);
                }

            elseif(!empty($file2)) {
                $fileName = $imageUploader->moveAndRename($file2);
                $exercice->setScore($fileName);
            }
            elseif(!empty($file3)) {
                $fileName = $imageUploader->moveAndRename($file3);
                $exercice->setCode($fileName);
            }

            $manager = $this->getDoctrine()->getManager();

            $manager->flush();

            return $this->redirectToRoute('exercice', ['slug' => $slug]);
        }

        return $this->render(
            "/layout/form/form-exercice.html.twig",
            [
                "formExercice" => $formExercice->createView()
            ]
        );
    }

    //! DELETE //
    /**
     * @Route ("/delete_exercice/{id}",name ="delete_exercice")
     * @IsGranted("ROLE_ADMIN")
     */
    public function deleteArticle(Exercice $exercice)
    {

        $this->getDoctrine()->getManager()->remove($exercice);
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('training');
    }

}