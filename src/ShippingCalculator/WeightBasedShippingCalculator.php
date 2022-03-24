<?php

declare(strict_types=1);

namespace App\ShippingCalculator;

use Sylius\Component\Shipping\Calculator\CalculatorInterface;
use Sylius\Component\Shipping\Model\ShipmentInterface;

class WeightBasedShippingCalculator implements CalculatorInterface
{
    public function calculate(ShipmentInterface $subject, array $configuration): int
    {
        $totalWeight = 0.0;

        foreach ($subject->getOrder()->getItems() as $item) {
            $totalWeight += $item->getVariant()->getWeight() * $item->getQuantity();
        }

        if ($totalWeight >= $configuration['weight']) {
            return $configuration['above_or_equal'];
        }

        return $configuration['below'];
    }

    public function getType(): string
    {
        return 'weight_based';
    }
}
