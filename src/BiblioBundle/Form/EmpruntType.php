<?php

namespace BiblioBundle\Form;

use BiblioBundle\Entity\Eleve;
use BiblioBundle\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EmpruntType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateEmprunt', DateType::class, array(
                'label' => 'Date d\'emprunt',
                'attr' => array(
                    'id' => 'dateEmprunt',
                    'class' => 'form-control'
                )
            ))
            ->add('dateRendu', DateType::class, array(
                'label' => 'Date du rendu',
                'attr' => array(
                    'id' => 'dateRendu',
                    'class' => 'form-control'
                )
            ))
            ->add('eleve', EntityType::class, array(
                'class' => Eleve::class,
                'choice_label' => 'nom',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('livre', EntityType::class, array(
                'class' => Livre::class,
                'choice_label' => 'id',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Enregistrer',
                'attr' => array(
                    'class' => 'btn btn-success'
                )
            ))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BiblioBundle\Entity\Emprunt'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bibliobundle_emprunt';
    }


}
