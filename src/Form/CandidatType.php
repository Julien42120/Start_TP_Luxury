<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Form\GenderType;
use App\Entity\Candidat;
use App\Entity\Experience;
use App\Entity\Gender;
use App\Entity\JobCategory;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('country', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('cv', FileType::class, [
                'mapped'=> false,
                'required' => false
            ])
            ->add('picture', FileType::class, [
                'mapped'=> false,
                'required' => false
            ])
            ->add('current_location', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('adress', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('nationality', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('availability')
            ->add('short_description', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('passport', FileType::class, [
                'mapped'=> false,
                'required' => false
            ])
            ->add('birth_date', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
            ])
            ->add('birth_location', TextType::class,[
                'required' => false,
                'empty_data' => '',
            ])
            ->add('user', UserType::class, [
                'mapped'=>false,
                'required'=>false
            ])
            ->add('gender', EntityType::class, [
                'class' => Gender::class,
                
            ])
            ->add('experience', EntityType::class, [
                'class' => Experience::class,
                
            ])
            ->add('job_cat', EntityType::class, [
                'class' => JobCategory::class,
            ]);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Candidat::class,
        ]);
    }
}
