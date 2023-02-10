<?php

// namespace App\Form;

// use App\Entity\Tire;
// use Symfony\Component\Form\AbstractType;
// use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Component\OptionsResolver\OptionsResolver;

// class TireType extends AbstractType
// {
//     public function buildForm(FormBuilderInterface $builder, array $options): void
//     {
//         $builder
//             ->add('mark')
//             ->add('description')
//             ->add('stock')
//             ->add('price')
//             ->add('date_add')
//             ->add('date_update')
//             ->add('picture')
//             ->add('picture2')
//             ->add('picture3')
//             ->add('season')
//             ->add('width')
//             ->add('height')
//             ->add('diameter')
//             ->add('new_used')
//         ;
//     }

//     public function configureOptions(OptionsResolver $resolver): void
//     {
//         $resolver->setDefaults([
//             'data_class' => Tire::class,
//         ]);
//     }
// }

namespace App\Form;

use App\Entity\Tire;
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

class TireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mark', TextType::class, [
                'required' => true,
                'label' => 'Marque',
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextareaType::class, ['required' => false,
                'label' => 'Description',
                'attr' => ['class' => 'form-control']
                ])
            ->add('season', null, ['attr' => ['class' => 'custom-select'],
                'label' => 'Saison',
                'attr' => ['class' => 'form-select']
                ])
            ->add('width', null, ['attr' => ['class' => 'custom-select'],
                'label' => 'Largeur',
                'attr' => ['class' => 'form-select']
                ])
            ->add('height', null, ['attr' => ['class' => 'custom-select'],
                'label' => 'Hauteur',
                'attr' => ['class' => 'form-select']
                ])
            ->add('diameter', null, ['attr' => ['class' => 'custom-select'],
                'label' => 'Diamètre',
                'attr' => ['class' => 'form-select']
                ])
            ->add('new_used', null, ['attr' => ['class' => 'custom-select'],
                'label' => 'État',
                'attr' => ['class' => 'form-select']
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
            ->add('stock', IntegerType::class, [
                'required' => true,
                'label' => 'Stock',
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
            
            ->add('date_add', HiddenType::class, ['mapped' => false, 'data_class' => null])
            ->add('date_update', HiddenType::class, ['mapped' => false, 'data_class' => null]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Tire::class,
        ]);
    }
}