<?php

namespace Core\Builder\Weather;

use Core\Entity\Weather;

/**
 * Interface BuilderInterface
 * @package Core\Builder\Weather
 */
interface BuilderInterface
{
    /**
     * @param $data
     * @return Weather
     */
    public function create($data) :Weather;
}