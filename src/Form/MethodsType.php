<?php

namespace App\Form;

use App\Entity\Fizjoterapy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MethodsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label'=> 'Nazwa'] )
            ->add('text', TextareaType::class,['label'=> 'Opis'])
            ->add('type', ChoiceType::class, [
                'label' => 'Kategoria',
                'choices' => [
                    'Fizykoterapia' => 1,
                    'Kinezyterapia' => 2,
                    'Masaż' => 3,
                ]
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Fizjoterapy::class
        ]);
    }
}