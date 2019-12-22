<?php

namespace Core\Builder\Weather;

use Core\Entity\Weather;

/**
 * Class WeatherBuilder
 * @package Core\Builder
 */
abstract class WeatherBuilder implements BuilderInterface
{
    /**
     * @param mixed $data
     * @return Weather
     */
    abstract public function create($data) :Weather;

    /**
     * @param array $attributes
     * @return Weather
     * @throws \Exception
     */
    final protected function build(array $attributes) :Weather
    {
        $weather = new Weather();

        $diff = array_diff($weather->attributes, array_keys($attributes));

        if ($diff) {
            throw new \Exception('Builder ' . get_class($this) . ' undefined attribute names: ' . implode(', ', $diff));
        }

        $diff = array_diff(array_keys($attributes), $weather->attributes);

        if ($diff) {
            throw new \Exception('Builder ' . get_class($this) . ' set undefined attribute names: ' . implode(', ', $diff));
        }

        foreach ($attributes as $attribute => $value) {
            $weather->{$attribute} = $value;
        }

        return $weather;
    }
}