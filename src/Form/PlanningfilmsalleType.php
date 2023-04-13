<?php

namespace App\Form;

use App\Entity\Salle;
use App\Entity\Film;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Planningfilmsalle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class PlanningfilmsalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datediffusion', null, [
                'constraints' => [
                    new GreaterThan('today'),
                    new NotBlank(),
                ],
            ])
            ->add('heurediffusion', null, [
                'constraints' => [
                    new Regex('/^(?:[01]\d|2[0-3]):[0-5]\d$/'),
                    new NotBlank(),
                ],
            ])
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
