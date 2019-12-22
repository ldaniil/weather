<?php

namespace Core\Strategy\Weather;

use Core\Entity\Weather;

/**
 * Interface AttributesOrderInterface
 * @package Core\Strategy\Weather
 */
interface AttributesOrderInterface
{
    /**
     * @param Weather $weather
     * @return array
     */
    public function sort(Weather $weather) :array;
}