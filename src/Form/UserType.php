<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label'=>'user.fields.name'])
            ->add('email', EmailType::class, ['label'=>'user.fields.email'])
            ->add('date', DateType::class, [
                // 'mapped'=> false, 
                'years'=> range(date('Y')-70,date('Y')),
                'label'=>'user.fields.date',
                ],
            )
            ->add('save', SubmitType::class)
        ;

    }
}