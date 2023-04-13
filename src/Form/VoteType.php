<?php

namespace App\Form;

use App\Entity\Vote;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('valeur', RangeType::class, [
                'attr' => [
                    'min' => 0,
                    'max' => 5,
                    'step' => 1,
                ],
            ])

            ->add('IdUser', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'prenom',
                'placeholder' => 'Choose a user',
                'required' => false,
            ])
            ->add('ID_film', EntityType::class, [
                'class' => Film::class,
                'choice_label' => 'titre',
                'placeholder' => 'Choose a film',
                'required' => false,
            ])
            ->add('commentaire')
            ->add('dateVote', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd',
                'label' => 'Date Vote'
            ])
                        
            ->add('voteFilm', CheckboxType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vote::class,
        ]);
    }
}
