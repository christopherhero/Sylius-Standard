<?php

declare(strict_types=1);

namespace App\Form\Type\ShippingCalculator;

use Sylius\Bundle\MoneyBundle\Form\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class WeightBasedShippingCalculatorType extends AbstractType
{
    public function getBlockPrefix(): string
    {
        return 'sylius_channel_weight_based_shipping_calculator';
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('weight', NumberType::class)
            ->add('above_or_equal', MoneyType::class, [
                'currency' => $options['currency']
            ])
            ->add('below', MoneyType::class, [
                'currency' => $options['currency']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('currency')
            ->setAllowedTypes('currency', 'string')
        ;
    }
}
