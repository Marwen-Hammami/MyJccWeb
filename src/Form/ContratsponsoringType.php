<?php

namespace App\Form;

use App\Entity\Contratsponsoring;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContratsponsoringType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datedebut')
            ->add('datefin')
            ->add('type')
            ->add('etat')
            ->add('salairedt')
            ->add('termespdf')
            ->add('signaturesponsor')
            ->add('signaturephotographe')
            ->add('idSponsor', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nom',
            ])
            ->add('idPhotographe', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nom',
            ])
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contratsponsoring::class,
        ]);
    }
}
