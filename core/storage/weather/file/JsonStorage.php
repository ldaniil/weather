<?php

namespace Core\Storage\Weather\File;

use Core\Storage\Weather\FileStorage;

/**
 * Class JsonStorage
 * @package Core\Storage\Weather\File
 */
class JsonStorage extends FileStorage
{
    const FILE_NAME = 'weather.json';

    /**
     * @param array $weather
     * @return bool
     */
    public function save(array $weather) :bool
    {
        $data = json_encode($weather);
        $this->write($data, self::FILE_NAME);

        return true;
    }
}