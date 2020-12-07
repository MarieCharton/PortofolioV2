<?php

namespace App\Form;

use App\Entity\Exercice;
use App\Entity\Hashtag;
use App\Entity\Platform;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ExerciceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, ["label" => "Nom de l'exercice"])
            ->add('description',TextareaType::class, ["label" => "Description de l'exercice"])
            ->add('link',TextareaType::class, ["label" => "Lien de l'exercice"])
            ->add('target', FileType::class, [
                'label' => "Image de l'article",
                'mapped'=>false,
                "required"=> false
                ])
            ->add('score', FileType::class, [
                'label' => "Image 2 de l'article",
                'mapped'=>false,
                "required"=> false
                ])
            ->add('code', FileType::class, [
                'label' => "Image 3 de l'article",
                'mapped'=>false,
                "required"=> false
                ])
                ->add('platform', EntityType::class, [
                    'class' => Platform::class,
                    'choice_label' => 'name',
                    'multiple' => false,
                ])
            ->add('envoyer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exercice::class,
        ]);
    }
}