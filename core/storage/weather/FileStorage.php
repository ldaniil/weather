<?php

namespace Core\Storage\Weather;

use Core\Weather;
use Core\Serializer\Weather\SerializerInterface;


/**
 * Class FileStorage
 * @package Core\Storage\Weather
 */
class FileStorage implements StorageInterface
{
    /**
     * @var
     */
    protected $baseDir;

    /**
     * @var
     */
    protected $fileName;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * FileStorage constructor.
     * @param string $baseDir
     * @param string $fileName
     * @param SerializerInterface $serializer
     */
    public function __construct(string $baseDir, string $fileName, SerializerInterface $serializer)
    {
        $this->baseDir = $baseDir;

        $this
            ->setFileName($fileName)
            ->setSerializer($serializer);
    }

    /**
     * @param Weather $weather
     * @return bool
     */
    public function save(Weather $weather) :bool
    {
        $fp = fopen($this->baseDir . DIRECTORY_SEPARATOR . $this->fileName, 'w');
        fwrite($fp, $this->serializer->serialize($weather));
        fclose($fp);

        return true;
    }

    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
        return $this;
    }
}