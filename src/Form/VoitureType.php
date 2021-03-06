<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom : ', 'required' => True])
            ->add('matricule', TextType::class, ['label' => 'Matricule : ', 'required' => True])
            ->add('description', TextareaType::class, ['label' => 'Description : ', 'required' => True])
            ->add('photo', FileType::class, ['data_class' => null, 'label' => 'Photo : ', 'required' => False])
            ->add('prix', NumberType::class, [
                'label' => 'Prix : ', 
                'required' => True, 
                'html5' => true , 
                'attr' => array(
                'min'  => 0,
                'max'  => 9999.99,
                'step' => 0.01,
                ),
            ])
            ->add('modele', ChoiceType::class, [
                'label' => 'Modéle : ', 
                'required' => True,
                'placeholder'=>'Choisir un modéle',
                'choices' => [
                    'CITADINE' => 'CITADINE',
                    'COMPACTE' => 'COMPACTE',
                    'BERLINE' => 'BERLINE',
                    'COUPE' => 'COUPE',
                    'CABRIOLET' => 'CABRIOLET',
                    'SUV' => 'SUV',
                    'MONOSPACE' => 'MONOSPACE',
                    'UTILITAIRE' => 'UTILITAIRE',
                    'PICK UP' => 'PICK UP',

                ],
                ])
            ->add('marque', TextType::class, ['label' => 'Marque : ', 'required' => True])
            ->add('dispo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
