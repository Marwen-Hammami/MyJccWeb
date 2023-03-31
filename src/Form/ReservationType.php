<?php

namespace App\Form;

use App\Entity\Hotel;
use App\Entity\User;
use App\Entity\ReservationHotel;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          //  ->add('datereservation')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('TarifTotale')
          //  ->add('qrpath')
            ->add('idHotel', EntityType::class,[
                'label' => 'Choisir un Hotel',
                'placeholder' => 'Hotel',
                'class' => Hotel::class,
                'choice_label' => 'libelle'
            ])
            ->add('idUser', EntityType::class,[
                'label' => "Choisir un invité ",
                'class' => User::class,
                'choice_label' => function($user) {
                    return $user->getNom() . ' ' . $user->getPrenom();
                },
                'placeholder' => 'choisir un invité',
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->add('cancel', SubmitType::class, ['label' => 'Annuler']) ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReservationHotel::class,
        ]);
    }
}
