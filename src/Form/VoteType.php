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
            ->add('valeur')
            ->add('ID_User')
            ->add('ID_Film')
            ->add('commentaire')
            ->add('dateVote', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'format' => 'yyyy-MM-dd',
                'label' => 'Date Vote'
            ])
            ->add('voteFilm');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vote::class,
        ]);
    }
}
