<?php

namespace Core\Source;

use Core\Weather;
use Core\Source\Weather\FactoryInterface;

/**
 * Class WeaherSource
 * @package Core\Source
 */
class WeatherSource
{
    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @var string
     */
    protected $location;

    /**
     * WeatherSource constructor.
     * @param FactoryInterface $factory
     * @param string $location
     */
    public function __construct(FactoryInterface $factory, string $location)
    {
        $this
            ->setFactory($factory)
            ->setLocation($location);
    }

    /**
     * @return Weather
     */
    public function getWeather() :Weather
    {
        $source = $this->factory->getApi();
        $builer = $this->factory->getBuilder();

        $data = $source->getData($this->location);
        return $builer->build($data);
    }

    /**
     * @param FactoryInterface $factory
     * @return $this
     */
    public function setFactory(FactoryInterface $factory)
    {
        $this->factory = $factory;
        return $this;
    }

    /**
     * @param string $location
     * @return $this
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
        return $this;
    }
}