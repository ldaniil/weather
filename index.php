<?php

require __DIR__ . '/vendor/autoload.php';

use Core\Application;
use Core\Repository\WeatherRepository;
use Core\Source\WeatherSource;
use Core\Storage\Weather\StorageFactory;
use Core\Source\Weather\Factory\WeatherstackFactory;
use Core\Sorter\Weather\Attributes\{AttributesSorter, Order\OrderOne, Order\OrderTwo};

$repository = new WeatherRepository();
$storageFactory = new StorageFactory(['storageDir' => __DIR__ . DIRECTORY_SEPARATOR . 'runtime']);

$application = new Application($repository, $storageFactory);

$source = new WeatherSource(new WeatherstackFactory(), 'Tashkent');
$sorter = new AttributesSorter(new OrderOne());

$application->run($source, StorageFactory::TYPE_JSON, $sorter);
$application->run($source->setLocation('Samarkand'), StorageFactory::TYPE_XML, $sorter->setOrder(new OrderTwo()));