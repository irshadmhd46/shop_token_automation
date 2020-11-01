<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;

/**
 * Description of ConsulationDetailsFormType
 *
 * @author irshad
 */
class ClinicDetailsFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('clinicName', TextType::class, [
                    'label' => 'Clinic Name',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Clinic name',
                        'class' => 'clinicName form-control clearAllFields'
                    ]
                ])
                ->add('logoPath', FileType::class, [
                    'label' => 'Clinic Logo ',
                    // unmapped means that this field is not associated to any entity property
                    'mapped' => false,
                    // make it optional so you don't have to re-upload the PDF file
                    // every time you edit the Product details
                    'required' => false,
                    // unmapped fields can't define their validation using annotations
                    // in the associated entity, so you can use the PHP constraint classes
                    'constraints' => [
                        new File([
                            'maxSize' => '1024k',
                            'mimeTypes' => [
                                'image/jpg'
                            ],
                            'mimeTypesMessage' => 'Please upload a valid Jpg Image',
                                ])
                    ],
                    'attr' =>
                        ['class' => 'clinicLogo']
                ])
                ->add('physicianName', TextType::class, [
                    'label' => 'Physician Name',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Physician Name',
                        'class' => 'physicianName form-control clearAllFields'
                    ]
                ])
                ->add('physicianContact', TextType::class, [
                    'label' => 'Physician Contact',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Physician Contact',
                        'class' => 'physicianContact form-control clearAllFields'
                    ]
                ])
                ->add('patientFirstName', TextType::class, [
                    'label' => 'Patient First Name',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Patient First Name',
                        'class' => 'patientFirstName form-control clearAllFields'
                    ]
                ])
                ->add('patientLastName', TextType::class, [
                    'label' => 'Patient Last Name',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Patient last Name',
                        'class' => 'patientLastName form-control clearAllFields'
                    ]
                ])
                ->add('patientDob', DateType::class, [
                    'label' => 'Patient DOB',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Patient DOB',
                        'class' => 'patientLastName form-control clearAllFields'
                    ]
                ])
                ->add('patientContact', TextType::class, [
                    'label' => 'Patient Contact',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Patient Contact',
                        'class' => 'patientContact form-control clearAllFields'
                    ]
                ])
                ->add('chiefComlaint', TextType::class, [
                    'label' => 'Chief Comlaint',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Chief Comlaint',
                        'class' => 'chiefComlaint form-control clearAllFields'
                    ]
                ])
                ->add('consultationNote', TextType::class, [
                    'label' => 'Consultation Note',
                    'required' => true,
                    'attr' =>
                        ['placeholder' => ' Consultation Note',
                        'class' => 'consultationNote form-control clearAllFields'
                    ]
                ])
        ;
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
        return 'appbundle_clinicDetails';
    }

}
