<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Vich\UploaderBundle\Form\Type\VichImageType;
class Reclamation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('prenom',TextType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('email',EmailType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('numeroMobile',TextType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('dateCreation')
            ->add('description',TextareaType::class, array('required' => false, 'attr' => array('class' => 'form-control')))
            ->add('nomservcie',choiceType::class, [
                'attr' => array('class' => 'form-control'),
                'choices' =>[
                    'Service Article'=>'Service Article',
                    'Service de Vente'=>'Service de Vente',
                    'Service Communication'=>'Service Communication',
                    'Service Avis'=>'Service Avis'
                ],

                'multiple'=>false,
                'label'=>'roles'
            ])
            ->add('imageFile', VichImageType::class, [
                'label' => 'Image de loffre ( des images uniquement)',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
