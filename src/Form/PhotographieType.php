<?php

namespace App\Form;

use App\Entity\Galerie;
use App\Entity\Photographie;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints as Assert;

class PhotographieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('photographiepath', FileType::class, [
                'label' => 'Votre Photographie',
                'constraints' => [
                    new Assert\Image(['maxSize' => '5M']),
                ],
                'mapped' => false,
                'required' => true,
            ])
            ->add('idGalerie', EntityType::class, [
                'class' => Galerie::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Photographie::class,
        ]);
    }
}
