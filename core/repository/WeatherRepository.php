<?php

namespace Core\Repository;

use Core\Entity\Weather;
use Core\Storage\Weather\StorageInterface;
use Core\Strategy\Weather\AttributesOrder;

/**
 * Class WeatherRepository
 * @package Core\Repository
 */
class WeatherRepository
{
    /**
     * @param Weather $weather
     * @param StorageInterface $storage
     * @param AttributesOrder $order
     * @return bool
     */
    public function save(Weather $weather, StorageInterface $storage, AttributesOrder $order)
    {
        $data = $order->sort($weather);

        return $storage->save($data);
    }
}