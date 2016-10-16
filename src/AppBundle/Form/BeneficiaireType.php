<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormTypeInterface;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use AppBundle\Entity\Photo;
use AppBundle\Form\PhotoType;
//use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BeneficiaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenoms')
            ->add('naissance')
            ->add('sexe', ChoiceType::class, array(
                'choices' => array(
                  'Homme' => 'M',
                  'Femme' => 'F'
                ),
                'required'  => true,
                'placeholder' => 'Choisir le sexe',
                'empty_data' => null
            ))
            ->add('nationalite')
            ->add('domicile')
            ->add('flotte')
            ->add('telephone')
            ->add('famille', ChoiceType::class, array(
                'choices' => array(
                  'Celibataire' => 'Celibataire',
                  'Marié(e)'  =>  'Marié',
                  'Divorcé(e)' => 'Divorcé',
                  'Veuf/veuve'  =>  'Veuf/veuve'
                ),
                'placeholder'  => 'Choisir la situation matrimoniale'
            ))
            ->add('enfant')
            ->add('professionnel', ChoiceType::class, array(
                'choices' => array(
                  'Employé(e)'  => 'Employé',
                  'Sans emploi'  =>  'Sans emploi',
                  'Autres'  =>  'Autres'
                ),
                'required'  => false,
                'placeholder'=> 'Votre situation professionnelle',
                'empty_data'  => null
            ))
            ->add('fonction', TextType::class, array(
                'required'  => false,
                'empty_data'  => null,
            ))
            ->add('bancaire', CheckboxType::class, array(
                'label' => 'Avez-vous un compte bancaire ?',
                'required'  => false,
            ))
            ->add('banque', TextType::class, array(
                'required'  => false,
                'empty_data'  => null,
            ))
            ->add('dateouverture')
            ->add('vague', ChoiceType::class, array(
                'choices' => array(
                  'Vague 1'  => '1',
                  'Vaque 2'  =>  '2',
                  'Vague 3'  =>  '3',
                  'Vague 4'  => '4',
                  'Vaque 5'  =>  '5',
                  'Vague 6'  =>  '6',
                  'Vague 7'  => '7',
                  'Vaque 8'  =>  '8',
                  'Vague 9'  =>  '9',
                ),
                'required'  => true
            ))
            ->add('projet')
            ->add('entreprise')
            ->add('activite', CheckboxType::class, array(
                'label' => 'Êtes-vpus déjà en activité ?',
                'required'  => false,
            ))
            ->add('dateactivite')
          //->add('inscriptionAt')
            ->add('user')
            ->add('zone')
            ->add('domaines')
            ->add('photo', PhotoType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Beneficiaire'
        ));
    }
}
