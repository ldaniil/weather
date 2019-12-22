<?php

require __DIR__ . '/vendor/autoload.php';

use Core\Application;
use Core\Repository\WeatherRepository;
use Core\Source\WeatherSource;
use Core\Storage\Weather\StorageFactory;
use Core\Source\Weather\Factory\WeatherstackFactory;
use Core\Strategy\Weather\{AttributesOrder, Order\OrderOne, Order\OrderTwo};

$repository = new WeatherRepository();
$storageFactory = new StorageFactory(['storageDir' => __DIR__ . DIRECTORY_SEPARATOR . 'runtime']);

$application = new Application($repository, $storageFactory);

$source = new WeatherSource(new WeatherstackFactory(), 'Tashkent');
$order = new AttributesOrder(new OrderOne());

$application->run($source, StorageFactory::TYPE_JSON, $order);
$application->run($source->setLocation('Samarkand'), StorageFactory::TYPE_XML, $order->setOrder(new OrderTwo()));