<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Voiture;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDeb')
            ->add('dateFin')
            ->add('prixJ')
            ->add('voiture', null,[
                'choice_label' =>function(Voiture $voiture) {
                    return $voiture->getId() . ". " . $voiture->getNom();
                },
                'placeholder'=>'Choisir une voiture',
                'label' => 'Voiture'
            ])
            ->add('client', null,[
                'choice_label' =>function(Client $client) {
                    return $client->getId() . ". " . $client->getNom() . " " . $client->getPrenom();
                },
                'placeholder'=>'Choisir un client',
                'label' => 'Client'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
