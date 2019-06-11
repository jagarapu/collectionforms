<?php

namespace AppBundle\Form;

use AppBundle\Entity\VoucherCollection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Valid;

class VoucherCollectionType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('vouchers', CollectionType::class, [
                'entry_type' => VoucherType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]
            )
            ->add(
                'saveAndAdd',
                SubmitType::class,
                [
                    'label' => 'Save & Add',
                    'attr' => [
                        'class' => 'btn btn-sm green btn_formSave btn_form_submission',
                    ],
                    'validation_groups' => ['Default', 'newVoucher'],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => VoucherCollection::class,
            'constraints' => new Valid(),
        ]);
    }

}