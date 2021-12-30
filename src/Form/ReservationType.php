<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Voiture;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDeb', DateType::class, ['label' => 'Date De Début : ', 'required' => True, 'widget' =>'single_text'])
            ->add('dateFin', DateType::class ,['label' => 'Date De Fin : ', 'required' => True, 'widget' =>'single_text'])
            ->add('prixJ', NumberType::class ,[
                'label' => 'Prix Par Jour : ', 
                'required' => True,
                'html5' => true , 
                'attr' => array(
                'min'  => 0,
                'max'  => 9999.99,
                'step' => 0.01,
                ),
            ])
            ->add('voiture', null,[
                'choice_label' =>function(Voiture $voiture) {
                    return ($voiture->getDispo() == true) ? $voiture->getId() . ". " . $voiture->getNom() : null;
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
