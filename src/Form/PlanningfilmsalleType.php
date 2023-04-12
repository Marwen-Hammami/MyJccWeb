<?php

namespace App\Form;
use App\Entity\Salle;
use App\Entity\Film;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Planningfilmsalle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanningfilmsalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('datediffusion')
        ->add('heurediffusion')
        ->add('idSalle', EntityType::class, [
            'class' => Salle::class,
            'choice_label' => 'nomsalle',
        ])
        ->add('idFilm', EntityType::class, [
            'class' => Film::class,
            'choice_label' => 'titre',
        ])
    ;
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planningfilmsalle::class,
        ]);
    }
}
