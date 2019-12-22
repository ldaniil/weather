<?php

namespace Core\Strategy\Weather\Order;

use Core\Strategy\Weather\AttributesOrderInterface;
use Core\Entity\Weather;

/**
 * Class OrderOne
 * @package Core\Strategy\Weather\Order
 */
class OrderOne implements AttributesOrderInterface
{
    /**
     * @param Weather $weather
     * @return array
     */
    public function sort(Weather $weather): array
    {
        return [
            'date' => $weather->date,
            'temperature' => $weather->temperature,
            'windDirection' => $weather->windDirection,
            'windSpeed' => $weather->windSpeed,
            'location' => $weather->location,
        ];
    }
}