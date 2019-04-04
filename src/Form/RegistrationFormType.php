<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//
            ->add('username' , TextType::class, ['label' => 'Username'])
            ->add(
                'password',
                RepeatedType::class,
                [
                    'type'=>PasswordType::class,
                    'invalid_message' => 'Password must match',
                    'first_options' => ['label' => 'Password'],
                    'second_options' => ['label' => 'Repeat password']
                ]
                )->add('email', EmailType::class)
                ->add(
                    'termAccepted',
                    CheckboxType::class,
                    ['label'=>'Accept term of service']
                 );
            if ($options['standalone']) {
                $builder->add('Submit', SubmitType::class);
            }

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'standalone' => false
        ]);
    }
}
