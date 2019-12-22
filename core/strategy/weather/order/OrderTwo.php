<?php

namespace Core\Strategy\Weather\Order;

use Core\Strategy\Weather\AttributesOrderInterface;
use Core\Entity\Weather;

/**
 * Class OrderTwo
 * @package Core\Strategy\Weather\Order
 */
class OrderTwo implements AttributesOrderInterface
{
    /**
     * @param Weather $weather
     * @return array
     */
    public function sort(Weather $weather): array
    {
        return [
            'date' => $weather->date,
            'windSpeed' => $weather->windSpeed,
            'temperature' => $weather->temperature,
            'windDirection' => $weather->windDirection,
            'location' => $weather->location,
        ];
    }
}