<?php

namespace Core\Storage\Weather;

/**
 * Class FileStorage
 * @package Core\Storage\Weather
 */
abstract class FileStorage implements StorageInterface
{
    protected $storageDir;

    /**
     * FileStorage constructor.
     * @param string $storageDir
     */
    public function __construct(string $storageDir)
    {
        $this->storageDir = $storageDir;
    }

    /**
     * @param $data
     * @param $fileName
     */
    final protected function write($data, $fileName)
    {
        $fp = fopen($this->storageDir . DIRECTORY_SEPARATOR . $fileName, 'w');
        fwrite($fp, $data);
        fclose($fp);
    }
}