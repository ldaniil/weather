<?php

namespace Core\Serializer\Weather;

use Core\Weather;

/**
 * Interface SerializerInterface
 * @package Core\Serializer\Weather
 */
interface SerializerInterface
{
    public function serialize(Weather $weather) :string;
}