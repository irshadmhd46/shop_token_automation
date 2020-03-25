<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ShopMasterType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                
                ->add('shopId', TextType::class, [
                    'label' => 'Shop Id',
                    'required' => true,
                    'label_attr' => ['class' => 'form-control-label'],
                    'attr' =>
                    ['placeholder' => ' Shop Id',
                        'class' => 'shopId form-control-label clearAllFields'
                    ]
                ])
                ->add('shopName', TextType::class, [
                    'label' => 'Shop Name',
                    'required' => true,
                    'label_attr' => ['class' => 'form-control-label'],
                    'attr' =>
                    ['placeholder' => ' Shop Name',
                        'class' => 'shopName form-control-label clearAllFields'
                    ]
                ])
                ->add('shopLocation', TextType::class, [
                    'label' => 'Location',
                    'required' => true,
                    'label_attr' => ['class' => 'form-control-label'],
                    'attr' =>
                    ['placeholder' => 'Location',
                        'class' => 'shopLocation form-control-label clearAllFields'
                    ]
                ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'appbundle_shopMaster';
    }

}
