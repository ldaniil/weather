<?php

namespace Core\Serializer\Weather;

use SimpleXMLElement;
use Core\Weather;

/**
 * Class XmlSerializer
 * @package Core\Serializer\Weather
 */
class XmlSerializer extends Serializer
{
    /**
     * @param Weather $weather
     * @return string
     */
    public function serialize(Weather $weather) :string
    {
        $attributes = $this->attributesSorter->sort($weather);

        $xml = new SimpleXMLElement('<weather/>');

        foreach ($attributes as $attribute => $value) {
            $xml->addChild($attribute, $value);
        }

        return $xml->asXML();
    }
}