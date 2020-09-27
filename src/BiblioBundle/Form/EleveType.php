<?php

namespace BiblioBundle\Form;

use BiblioBundle\Entity\Grade;
use BiblioBundle\Entity\Mention;
use Symfony\Component\Form\AbstractType;
use BiblioBundle\Repository\MentionRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EleveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('prenom', TextType::class, array(
                'label' => 'Prénom',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('mention', EntityType::class, array(
                'class' => Mention::class,
                'choice_label' => 'nom',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('grade', EntityType::class, array(
                'attr' => array(
                    'class' => 'form-control'
                ),
                'class' => Grade::class,
                'choice_label' => 'nom'
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
            'data_class' => 'BiblioBundle\Entity\Eleve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bibliobundle_eleve';
    }


}
