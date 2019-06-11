<?php

namespace AppBundle\Form;

use AppBundle\Entity\VoucherItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Valid;


class VoucherItemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextareaType::class,
            [
                'attr' => [
                    'class' => 'text11 col-md-12 text_name',
                    'style' => 'margin-bottom:2px;',
                    'placeholder' => 'Name',
                ],
            ]
        )
            ->add('amount',
                NumberType::class,
                [
                    'attr' => [
                        'class' => 'text_amount col-md-12 input-sm text11 width_150',
                    ],
                    'invalid_message' => 'You entered an invalid amount value',
                ])
            ->add('exchangeRate',
                NumberType::class,
                [
                    'scale' => 8,
                    'attr' => [
                        'class' => 'text_exch_rate col-md-12 input-sm text11 width_100',
                    ],
                    'invalid_message' => 'You entered an invalid exchange rate value',
                ])
            ->add('itemOrder',
                HiddenType::class,
                [
                    'attr' => [
                        'class' => 'text_item_order',
                    ],
                ])
        ;
        $builder->add(
            'delete',
            ButtonType::class,
            [
                'label' => 'Delete',
                'attr' => [
                    'tabindex' => -1,
                    'class' => 'btn btn-xs btn-danger',
                ]
            ]
        );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => VoucherItem::class,
            'constraints' => new Valid(),
            'validation_groups' => ['newVoucher', 'newVoucherItem'],
        ));
    }

}
