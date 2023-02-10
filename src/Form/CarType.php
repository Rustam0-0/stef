<?php

// namespace App\Form;

// use App\Entity\Car;
// use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Component\OptionsResolver\OptionsResolver;

// class CarType extends AbstractType
// {
//     public function buildForm(FormBuilderInterface $builder, array $options): void
//     {
//         $builder
//             ->add('title')
//             ->add('year')
//             ->add('description')
//             ->add('price')
//             ->add('date_add')
//             ->add('date_update')
//             ->add('status')
//         ;
//     }

//     public function configureOptions(OptionsResolver $resolver): void
//     {
//         $resolver->setDefaults([
//             'data_class' => Car::class,
//         ]);
//     }
// }

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true,
                'label' => 'Titre',
                'attr' => ['class' => 'form-control']
            ])
            ->add('year', TextType::class, [
                'required' => true,
                'label' => 'Année',
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
            ->add('picture', FileType::class, [
                'label' => 'Image 1',
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => 'image/*', 'class' => 'form-control-file'],
                'data_class' => null
            ])
            ->add('picture2', FileType::class, [
                'label' => 'Image 2',
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => 'image/*', 'class' => 'form-control-file'],
                'data_class' => null
            ])
            ->add('picture3', FileType::class, [
                'label' => 'Image 3',
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => 'image/*', 'class' => 'form-control-file'],
                'data_class' => null
            ])
            ->add('picture4', FileType::class, [
                'label' => 'Image 4',
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => 'image/*', 'class' => 'form-control-file'],
                'data_class' => null
            ])
            ->add('picture5', FileType::class, [
                'label' => 'Image 5',
                'mapped' => false,
                'required' => false,
                'attr' => ['accept' => 'image/*', 'class' => 'form-control-file'],
                'data_class' => null
            ])
            ->add('price', TextType::class, [
                'required' => true,
                'label' => 'Prix',
                'constraints' => [
                    new NotBlank(),
                    new Regex('/[0-9]{1,10}/')
                ],
                'attr' => ['class' => 'form-control']
            ])
            ->add('status', null, [
                'attr' => ['class' => 'custom-select'],
                'attr' => ['class' => 'form-select']
                ])
            ->add('date_add', HiddenType::class, ['mapped' => false, 'data_class' => null])
            ->add('date_update', HiddenType::class, ['mapped' => false, 'data_class' => null]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}