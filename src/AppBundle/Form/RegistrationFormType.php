<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseRegistrationFormType;

/**
 * Description of RegistrationFormType
 *
 * @author irshad
 */
class RegistrationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('phoneNo');
        $builder->add('firstName');
        $builder->remove('username');
    }

    public function getParent() {
        return BaseRegistrationFormType::class;
    }

}
