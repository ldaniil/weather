<?php

namespace Core\Storage\Weather;

use Core\Storage\Weather\File\JsonStorage;
use Core\Storage\Weather\File\XmlStorage;

/**
 * Class StorageFactory
 * @package Core\Storage\Weather
 */
class StorageFactory
{
    const TYPE_JSON = 'json';

    const TYPE_XML = 'xml';

    /**
     * @var array
     */
    protected $config;

    /**
     * StorageFactory constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param $type
     * @return StorageInterface
     * @throws \Exception
     */
    public function getStorage(string $type) :StorageInterface
    {
        if (in_array($type, [self::TYPE_JSON, self::TYPE_XML])) {
            $storageDir = $this->config['storageDir'];

            switch ($type) {
                case self::TYPE_JSON:

                    return new JsonStorage($storageDir);

                    break;

                case self::TYPE_XML:

                    return new XmlStorage($storageDir);

                    break;
            }
        }

        throw new \Exception('Undefined storage type: ' . $type);
    }
}