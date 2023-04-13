<?php

namespace App\Form;

use App\Entity\Film;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

class Film1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('daterealisation', null, [
                'constraints' => [
                    new Assert\NotBlank()
                ],
            ])
            ->add('genre', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('resume', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 2000]),
                ],
            ])
            ->add('duree', null, [
                'constraints' => [
                    new Assert\NotBlank()   
                ],
            ])
            ->add('prix', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\PositiveOrZero(),
                ],
            ])
            ->add('idProducteur', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
            ])
            ->add('acteur', null, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Length(['max' => 1000]),
                ],
            ])
            ->add('filmimage', FileType::class, [
                'constraints' => [
                    new Assert\Image(['maxSize' => '5M']),
                ],
                'mapped' => false,
                'required' => false,
            ])
            ->setMethod('POST')
            ->setAction($options['action'])
            ->setAttributes(['enctype' => 'multipart/form-data'])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
            'action' => '',
        ]);
    }
}
