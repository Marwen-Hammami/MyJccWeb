<?php

namespace App\Form;

use App\Entity\Galerie;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ColorType;

class GalerieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('couleurhtml', ColorType::class, [
                'label' => 'Choisir une couleur',
                'required' => false,
                'data' => '#C9F9A9' // set default color
            ])
            ->add('nom')
            ->add('description')
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
            'data_class' => Galerie::class,
        ]);
    }
}
