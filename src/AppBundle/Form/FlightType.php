<?php

namespace AppBundle\Form;

use AppBundle\Entity\PlaneModel;
use AppBundle\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('departure')
            ->add('arrival')
            ->add('nbFreeSeats')
            ->add('seatPrice')
            ->add('takeOffTime')
            ->add('publicationDate')
            ->add('description')
            ->add('pilot', EntityType::class, [
                'class'=>User::class,
                'choice_label'=>'getFullName'
            ])
            ->add('plane', EntityType::class, [
                'class'=>PlaneModel::class,
                'choice_label'=>'getModelManufacturer'
            ])
            ->add('wasDone');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Flight'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_flight';
    }


}
