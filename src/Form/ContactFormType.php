<?php

namespace App\Form;

use App\Entity\Contact;
//use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;


class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
              ->add('firstName',TextType::class, [
                  'attr' => [
                      'class' => 'form-control',
                      'minLength' => '3',
                      'maxLength' => '30',
                  ],
                  'label' => 'Prénom',

                  'constraints' => [
                      new Assert\NotBlank(),
                  ]
              ])

              ->add('lastName',TextType::class, [
                  'attr' => [
                      'class' => 'form-control',
                      'minLength' => '3',
                      'maxLength' => '30',
                  ],
                  'label' => 'Nom',

                  'constraints' => [
                      new Assert\NotBlank(),
                  ]
              ])
              ->add('email',EmailType::class, [
                  'attr' => [
                       'class' => 'form-control',
                       'minLength' => '5',
                       'maxLength' => '30',
              ],
                  'label' => 'Adresse email',
                  'label_attr' => [
                      'class' => 'form-label'
                  ],

                  'constraints' => [
                      new Assert\NotBlank(),
                      new Assert\Email(),
                      new Assert\Length(['min' => 5, 'max' => 30])
                  ]
              ])

              ->add('telephone', NumberType::class, [
                  'attr' => [
                      'class' => 'form-control',
                      'minLength' => '9',
                      'maxLength' => '11',
                  ],
                  'label' => 'Numéro de téléphone',
                  'label_attr' => [
                      'class' => 'form-label'
                  ],

                  'constraints' => [
                      new Assert\NotBlank(),
                                        ]
              ])

              ->add('message', TextareaType::class, [
                  'attr' => [
                      'class' => 'form-control',
                      'minLength' => '9',
                      'maxLength' => '255',
                  ],
                  'label' => 'Message',
                  'label_attr' => [
                      'class' => 'form-label'
                  ],
                  'constraints' => [
                      new Assert\NotBlank(),
                  ] ])

              ->add('submit', SubmitType::class, [
                  'attr' => [
                      'class' => 'btn btn-danger mt-2'
                  ],
                  'label' => 'Soumettre'
              ] );
    }

    public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults([
        'data_class'=> Contact::class,
    ]);
}



}