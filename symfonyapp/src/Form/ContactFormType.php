<?php

namespace App\Form;

use App\Entity\ContactForm;
use App\Entity\Departement;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('Departement', EntityType::class, [
                'class' => Departement::class,
                'placeholder' => '--Selectionnez un Département--',
                'choice_label' => 'nom',
                'mapped' => false
            ])
            ->add('mail')
            ->add('message')
            ;


            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
