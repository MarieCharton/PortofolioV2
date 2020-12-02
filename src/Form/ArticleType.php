<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Technology;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class, ["label" => "Titre de l'article"])
            ->add('content',TextareaType::class, ["label" => "Contenu de l'article"])
            ->add('image1', FileType::class, [
                'label' => "Image de l'article",
                'mapped'=>false,
                "required"=> false
                ])
            ->add('image2', FileType::class, [
                'label' => "Image 2 de l'article",
                'mapped'=>false,
                "required"=> false
                ])
            ->add('image3', FileType::class, [
                'label' => "Image 3 de l'article",
                'mapped'=>false,
                "required"=> false
                ])
            ->add('image4', FileType::class, [
                'label' => "Image 3 de l'article",
                'mapped'=>false,
                "required"=> false
                ])
                // ->add('categories', EntityType::class, [
                //     'class' => Category::class,
                //     'query_builder' => function (CategoryRepository $category) {
                //         return $category->createQueryBuilder('cat')
                //             ->orderBy('cat.name', 'ASC');
                //     },
                //     'choice_label' => 'name',
                //     'placeholder' => 'categorie',
                //     'multiple' => false,
                // ])
            ->add('technologies', EntityType::class, [
                'by_reference' => false,
                'class' => Technology::class,
                'choice_label' => 'name',
                'multiple' => true,
                "expanded"=> true,
            ])
            ->add('envoyer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}