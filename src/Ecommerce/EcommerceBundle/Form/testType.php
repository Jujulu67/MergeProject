<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class testType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici formulaire
        $builder

            ->add('date', null,["error_bubbling" => true, "label" => "Description de l'activité"]
            );
    }

    public function getName()
    {
        return 'ecommerce_ecommercebundle_test';
    }
}