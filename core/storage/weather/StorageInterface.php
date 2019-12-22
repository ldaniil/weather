<?php

namespace Core\Storage\Weather;

use Core\Entity\Weather;

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