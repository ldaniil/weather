<?php

namespace Core\Sorter\Weather\Attributes\Order;

use Core\Sorter\Weather\Attributes\AttributesOrderInterface;
use Core\Weather;

/**
 * Class OrderOne
 * @package Core\Sorter\Weather\Attributes\Order
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
            'date' => $weather->getDate(),
            'temperature' => $weather->getTemerature(),
            'windDirection' => $weather->getWindDirection(),
            'windSpeed' => $weather->getWindSpeed(),
            'location' => $weather->getLocation(),
        ];
    }
}