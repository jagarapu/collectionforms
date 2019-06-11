<?php

namespace AppBundle\Form;

use AppBundle\Entity\Exp;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('title', TextType::class)
           ->add('location', TextType::class)
           ->add('dateFrom', DateType::class, [
               'widget' => 'single_text',
           ])
           ->add('dateTo', DateType::class, [
               'widget' => 'single_text',
           ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exp::class,

        ]);
    }

    public function getBlockPrefix()
    {
        return 'appbundle_exp';
    }

}