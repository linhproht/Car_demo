<?php

namespace App\Form;

use App\Entity\Car;
use App\Entity\Supplier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarsupType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('price')
            ->add('cars', EntityType::class, [
                'class' => Car::class,
                'choice_label' => 'name'
            ])
            ->add('sups', EntityType::class,[
                'class'=>Supplier::class,
                'choice_label'=>'name'
            ])
            ->add('save', SubmitType::class)
            ;
    }
}
?>