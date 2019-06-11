<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
   $builder->add('fullname')
         ->add('exp', CollectionType::class, [
             'entry_type' => ExpType::class,
             'entry_options' => [
                 'label' => false,
             ],
             'by_reference' => false,
             'allow_add' => true,
             'allow_delete' => true,
         ] )
       ->add('save', SubmitType::class, [
           'attr' => [
               'class' => 'btn btn-success'
           ]
       ]);

}

public function configureOptions(OptionsResolver $resolver)
{
      $resolver->setDefaults([
          'data_class' => User::class,
      ]);
}

public function getBlockPrefix()
{
    return 'appbundle_user';
}

}