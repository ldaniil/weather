<?php

namespace Core\Sorter\Weather\Attributes\Order;

use Core\Sorter\Weather\Attributes\AttributesOrderInterface;
use Core\Weather;

/**
 * Class OrderTwo
 * @package Core\Sorter\Weather\Attributes\Order
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
            'date' => $weather->getDate(),
            'windSpeed' => $weather->getWindSpeed(),
            'temperature' => $weather->getTemerature(),
            'windDirection' => $weather->getWindDirection(),
            'location' => $weather->getLocation(),
        ];
    }
}