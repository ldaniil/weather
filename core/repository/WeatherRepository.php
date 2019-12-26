<?php

namespace Core\Repository;

use Core\Weather;
use Core\Storage\Weather\StorageInterface;
use Core\Sorter\Weather\Attributes\AttributesSorter;

/**
 * Class WeatherRepository
 * @package Core\Repository
 */
class WeatherRepository
{
    /**
     * @param Weather $weather
     * @param StorageInterface $storage
     * @param AttributesSorter $order
     * @return bool
     */
    public function save(Weather $weather, StorageInterface $storage, AttributesSorter $sorter)
    {
        $data = $sorter->sort($weather);

        return $storage->save($data);
    }
}