<?php

namespace AppBundle\Form;

use AppBundle\Entity\Flight;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nbReservedSeats')
            ->add('publicationDate')
            ->add('passenger', EntityType::class, [
                'class'=>User::class,
                'choice_label'=>'getFullName',
            ])
            ->add('flight', EntityType::class, [
                'class'=>Flight::class,
                'choice_label'=>'getDepartureArrival',
            ])
            ->add('wasDone');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_reservation';
    }


}
