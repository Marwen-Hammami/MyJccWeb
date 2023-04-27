<?php

namespace App\Form;

use App\Entity\Contratsponsoring;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ContratsponsoringType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datedebut', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'data' => new \DateTime(),
                'attr' => [
                    'min' => (new \DateTime())->format('Y-m-d')
                ]
            ])
            ->add('datefin', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'data' => new \DateTime(),
                'attr' => [
                    'min' => (new \DateTime())->format('Y-m-d')
                ]
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'ParPhoto' => 'ParPhoto',
                    'ParHeure' => 'ParHeure',
                    'ParSoiree' => 'ParSoiree',
                    'ParEdition' => 'ParEdition',
                ],
                'required' => true,
                // 'placeholder' => 'Sélectionner',
            ])
            ->add('etat', ChoiceType::class, [
                'choices' => [
                    'Proposition' => 'Proposition',
                    'ContreProposition' => 'ContreProposition',
                    'EnCours' => 'EnCours',
                    'Expire' => 'Expire',
                ],
                'required' => true,
                // 'placeholder' => 'Sélectionner',
            ])
            ->add('salairedt')
            // ->add('termespdf')
            // ->add('signaturesponsor')
            // ->add('signaturephotographe')
            ->add('idSponsor', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nom',
                'query_builder' => function (UserRepository $userRepository) {
                    return $userRepository->createQueryBuilder('u')
                        ->andWhere('u.role = :role')
                        ->setParameter('role', 'SPONSOR')
                        ->orderBy('u.nom', 'ASC');
                },
            ])
            ->add('idPhotographe', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'nom',
                'query_builder' => function (UserRepository $userRepository) {
                    return $userRepository->createQueryBuilder('u')
                        ->andWhere('u.role = :role')
                        ->setParameter('role', 'PHOTOGRAPHE')
                        ->orderBy('u.nom', 'ASC');
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contratsponsoring::class,
        ]);
    }
}
