<?php

namespace Core\Sorter\Weather\Attributes;

use Core\Weather;

/**
 * Interface AttributesOrderInterface
 * @package Core\Sorter\Weather
 */
interface AttributesOrderInterface
{
    /**
     * @param Weather $weather
     * @return array
     */
    public function sort(Weather $weather) :array;
}