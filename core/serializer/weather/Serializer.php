<?php

namespace Core\Serializer\Weather;

use Core\Weather;
use Core\Sorter\Weather\Attributes\AttributesSorter;

abstract class Serializer implements SerializerInterface
{
    protected $attributesSorter;

    public function __construct(AttributesSorter $attributesSorter)
    {
        $this->attributesSorter = $attributesSorter;
    }

    abstract public function serialize(Weather $weather) :string;
}