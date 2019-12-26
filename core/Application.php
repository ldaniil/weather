<?php

namespace Core;

use Core\Source\WeatherSource;
use Core\Storage\Weather\StorageInterface;

/**
 * Class Application
 * @package Core
 */
class Application
{
    /**
     * @param WeatherSource $source
     * @param StorageInterface $storage
     */
    public function run(WeatherSource $source, StorageInterface $storage)
    {
        $weather = $source->getWeather();
        $storage->save($weather);
    }
}