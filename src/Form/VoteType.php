<?php

namespace App\Form;

use App\Entity\Rate;
use App\Entity\User;
use App\Entity\Film;
use Doctrine\DBAL\Types\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class VoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('valeur', IntegerType::class, [
                'label' => 'Rate',
                'constraints' => [
                    new Valid(),
                ],
            ])
            ->add('idUser', EntityType::class, [
                'label' => "Choisir un invité ",
                'class' => User::class,
                'choice_label' => function ($user) {
                    return $user->getNom() . ' ' . $user->getPrenom();
                },
                'placeholder' => 'choisir user',
            ])
            ->add('idFilm', EntityType::class, [
                'label' => 'Choisir un Film',
                'class' => Film::class,
                'choice_label' => function ($film) {
                    return $film->getTitre();
                },
                'placeholder' => 'Film',
            ])
            ->add('commentaire')

            ->add('voteFilm', CheckboxType::class, [
                'label' => ' Vote pour ce film',
                'required' => false,
            ])

            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('cancel', SubmitType::class, ['label' => 'Annuler']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rate::class,
        ]);
    }
}
