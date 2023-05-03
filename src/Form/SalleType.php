<?php

namespace App\Form;

use App\Entity\Salle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;

class SalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomsalle', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a name for the room',
                    ]),
                ],
            ])
            ->add('adresse', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an address for the room',
                    ]),
                ],
            ])
            ->add('capacite', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the capacity of the room',
                    ]),
                    new Positive([
                        'message' => 'Capacity should be a positive number',
                    ]),
                ],
            ])
            ->add('numtelSalle', TelType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a phone number for the room',
                    ]),
                    new Regex([
                        'pattern' => '/^\d+$/',
                        'message' => 'Phone number should contain only digits',
                    ]),
                    new Positive([
                        'message' => 'Phone number should be a positive number',
                    ]),
                ],
            ])
            ->add('emailSalle', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an email for the room',
                    ]),
                    new Email([
                        'message' => 'Please enter a valid email',
                    ]),
                ],
            ])
            ->add('tempsOuverture', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the opening hours for the room',
                    ]),
                ],
            ])
            ->add('tempsFermuture', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter the closing hours for the room',
                    ]),
                ],
            ])
            ->add('avis', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a rating for the room',
                    ]),
                    new Regex([
                        'pattern' => '/^\d*(\.\d+)?$/',
                        'message' => 'Please enter a valid rating',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Salle::class,
        ]);
    }
}
