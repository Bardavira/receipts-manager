<?php

namespace App\Form;

use App\Entity\Appointment;
use App\Entity\Client;
use App\Entity\Income;
use App\Entity\Product;
use App\Entity\Professional;
use App\Entity\Service;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointmentForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('income', EntityType::class, [
                'class' => Income::class,
                'choice_label' => 'id',
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'id',
            ])
            ->add('professional', EntityType::class, [
                'class' => Professional::class,
                'choice_label' => 'id',
            ])
            ->add('services', EntityType::class, [
                'class' => Service::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('products', EntityType::class, [
                'class' => Product::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
