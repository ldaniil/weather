<?php

namespace Core\Source\Weather;

/**
 * Interface ApiInteface
 * @package Core\Source\Weather
 */
interface ApiInteface
{
    /**
     * @return mixed
     */
    public function getData(string $location);
}