<?php

namespace HotelBundle\Form;

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
        $builder->add('dateDep')
            ->add('dateArr')
            ->add('nbPers');
//            ->add('client' , 'Symfony\Bridge\Doctrine\Form\Type\EntityType' ,array(
//                'class' => 'UserBundle:Client',
//                'required'=> true,
//                'label' => 'Nom :',
//                'choice_label' => 'nom'
//            ));
//            ->add('chambre' , 'Symfony\Bridge\Doctrine\Form\Type\EntityType' , array(
//                'class' => 'HotelBundle:Chambre',
//                'required'=> true,
//                'label' => 'Expo :',
//                'choice_label' => 'expo'
//            ) );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HotelBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hotelbundle_reservation';
    }


}
