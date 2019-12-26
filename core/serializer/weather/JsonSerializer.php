<?php

namespace Core\Serializer\Weather;

use Core\Weather;

/**
 * Class JsonSerializer
 * @package Core\Serializer\Weather
 */
class JsonSerializer extends Serializer
{
    /**
     * @param Weather $weather
     * @return string
     */
    public function serialize(Weather $weather): string
    {
        $attributes = $this->attributesSorter->sort($weather);

        return json_encode($attributes);
    }
}