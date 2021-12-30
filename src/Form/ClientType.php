<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom : ', 'required' => True])
            ->add('prenom', TextType::class, ['label' => 'Prenom : ', 'required' => True])
            ->add('tel', TelType::class, ['label' => 'Télèphone : ', 'required' => True] )
            ->add('email', EmailType::class, ['label' => 'Email : ', 'required' => True])
            ->add('adresse', TextType::class, ['label' => 'Adresse : ', 'required' => False])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
