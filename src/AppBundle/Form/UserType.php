<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => "Nom d'utilisateur"))
            //->add('usernameCanonical')
            ->add('email', null, array('required' => false, 'label' => 'E-mail'))
            //->add('emailCanonical')
            //->add('enabled')
            //->add('salt')
            /*->add('password',RepeatedType::class, array(
              'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques.',
                'required' => true,
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Répétez le mot de passe'),
            ))*/
            //->add('lastLogin', 'datetime')
            ->add('locked', CheckboxType::class, array(
              'label'    => 'Verrouiller ce compte',
              'required' => false,
            ))
            //->add('expired')
            //->add('expiresAt', 'datetime')
            //->add('confirmationToken')
            //->add('passwordRequestedAt', 'datetime')
            //->add('roles')
            //->add('credentialsExpired')
            //->add('credentialsExpireAt', 'datetime')
            //->add('loginCount')
            //->add('firstLogin', 'datetime')
            ->add('groups', EntityType::class, array(
              'label' => 'Groupes',
                'multiple' => true,
                'expanded' => false,
                'required' => false,
              'class' => 'AppBundle:Group'
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }
}
