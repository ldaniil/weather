<?php

namespace Core\Storage\Weather;

use Core\Weather;

/**
 * Interface StorageInterface
 * @package Core\Storage
 */
interface StorageInterface
{
    /**
     * @param Weather $wheather
     * @return bool
     */
    public function save(array $weather) :bool;
}