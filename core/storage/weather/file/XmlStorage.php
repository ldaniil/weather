<?php

namespace Core\Storage\Weather\File;

use SimpleXMLElement;
use Core\Storage\Weather\FileStorage;

/**
 * Class XmlStorage
 * @package Core\Storage\Weather\File
 */
class XmlStorage extends FileStorage
{
    const FILE_NAME = 'weather.xml';

    /**
     * @param array $weather
     * @return bool
     */
    public function save(array $weather) :bool
    {
        $xml = new SimpleXMLElement('<weather/>');

        foreach ($weather as $attribute => $value) {
            $xml->addChild($attribute, $value);
        }

        $this->write($xml->asXML(), self::FILE_NAME);

        return true;
    }
}