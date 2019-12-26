<?php

require __DIR__ . '/vendor/autoload.php';

use Core\Application;
use Core\Source\WeatherSource;
use Core\Source\Weather\Factory\WeatherstackFactory;
use Core\Storage\Weather\FileStorage;
use Core\Serializer\Weather\{JsonSerializer, XmlSerializer};
use Core\Sorter\Weather\Attributes\AttributesSorter;
use Core\Sorter\Weather\Attributes\Order\{OrderOne, OrderTwo};


$application = new Application();

$sorter = new AttributesSorter(new OrderOne);

$jsonSerializer = new JsonSerializer($sorter);

$source = new WeatherSource(new WeatherstackFactory(), 'Tashkent');
$storage = new FileStorage(
    __DIR__ . DIRECTORY_SEPARATOR . 'runtime',
    'weather.json',
    $jsonSerializer
);

$application->run($source, $storage);

$xmlSerializer = new XmlSerializer($sorter->setOrder(new OrderTwo()));

$source->setLocation('Samarkand');
$storage
    ->setFileName('weather.xml')
    ->setSerializer($xmlSerializer);

$application->run($source, $storage);