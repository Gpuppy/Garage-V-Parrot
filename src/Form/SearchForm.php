<?php

namespace App\Form;

use App\Entity\Brand;
use App\Entity\SecondHandCar;
use App\Model\SearchData;

use Doctrine\DBAL\Types\DateTimeImmutableType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;

class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('q', TextType::class, [
                'empty_data' => '',
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'recherche de voiture'
                ]
            ])*/
            ->add('brands', EntityType::class, [
                'class' => Brand::class,
                'label' => false,
                'required' => false,
                'expanded' => true,
                'multiple' => true
            ])

            /*->add('min', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix minimum'
                ]
            ])
            ->add('max', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix maximum'
                ]
            ])*/


        ->add('minPrice', NumberType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Prix minimum'
            ]
        ])
            ->add('maxPrice', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Prix maximum'
                ]
            ])



            /*->add('km', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Kilometre'
                ]
            ])*/

            ->add('minKm', NumberType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'min Kilometre'
            ]
        ])
            ->add('maxKm', NumberType::class, [
        'label' => false,
        'required' => false,
        'attr' => [
            'placeholder' => 'max Kilometre'
        ]
    ])

           /* ->add('year', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Année'
                ]
            ])*/

            ->add('minYear', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Year from'
                ]
            ])
            ->add('maxYear', NumberType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Year to'
                ]
            ])



        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data class' => SearchData::class,
            'method' => 'GET',
            'csrf protection' => false
        ]);
    }


}