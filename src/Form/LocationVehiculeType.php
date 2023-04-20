<?php

namespace App\Form;

use App\Entity\LocationVehicule;
use App\Entity\User;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class LocationVehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {   
        
        $builder
           /* ->add('datereservation', TypeDateType::class, [
                'disabled' => true,
                'data' => $currentdate,
            ])*/

            ->add('dateDebut')
            ->add('dateFin')
            ->add('tariftotal')
            ->add('qrpath', TextType::class, [
                'disabled' => true,
            ])
            ->add('matricule', EntityType::class,[
                'label' => 'Choisir une voiture',
                'placeholder' => 'voiture',
                'class' => Vehicule::class,
                'choice_label' => function($vehicule) {
                    return $vehicule->getMarque() . ' ' . $vehicule->getCouleur();
                },
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
            'data_class' => LocationVehicule::class,
        ]);
    }
}
