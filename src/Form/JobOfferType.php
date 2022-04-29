<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\JobCategory;
use App\Entity\JobOffer;
use App\Entity\JobTypes;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class JobOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('note')
            ->add('location')
            ->add('closing_date', DateType::class, [
                'widget' => 'single_text'])
            ->add('salary')
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'required' => false
            ])
            ->add('job_cat', EntityType::class, [
                'class' => JobCategory::class,
            ])
            ->add('job_type', EntityType::class, [
                'class' => JobTypes::class,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobOffer::class,
        ]);
    }
}
