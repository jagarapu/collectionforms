<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use AppBundle\Entity\Voucher;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Valid;

class VoucherType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('items', CollectionType::class, [
                'entry_type' => VoucherItemType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype_name' => '__vitem__',
                'by_reference' => false,
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('documentNo', TextType::class, [
                'required' => false,
                'label' => 'Reference No.',
                'attr' => [
                    'class' => 'input-sm text11',
                ],
            ])
        ;
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Voucher::class,
            'constraints' => new Valid(),
        ));
    }

}
