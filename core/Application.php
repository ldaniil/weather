<?php

namespace Core;

use Core\Source\WeatherSource;
use Core\Repository\WeatherRepository;
use Core\Storage\Weather\StorageFactory;
use Core\Sorter\Weather\Attributes\AttributesSorter;

/**
 * Class Application
 * @package Core
 */
class Application
{
    /**
     * @var WeatherRepository
     */
    protected $repository;

    /**
     * @var StorageFactory;
     */
    protected $storageFactory;

    /**
     * Application constructor.
     * @param WeatherRepository $repository
     * @param StorageFactory $storageFactory
     */
    public function __construct(WeatherRepository $repository, StorageFactory $storageFactory)
    {
        $this->repository = $repository;
        $this->storageFactory = $storageFactory;
    }

    /**
     * @param WeatherSource $source
     * @param string $fileType
     * @param AttributesSorter $sorter
     */
    public function run(WeatherSource $source, string $fileType, AttributesSorter $sorter)
    {
        $weather = $source->getWeather();
        $storage = $this->storageFactory->getStorage($fileType);

        $this->repository->save($weather, $storage, $sorter);
    }
}