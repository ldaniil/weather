<?php

namespace Core\Entity;

/**
 * Class Weather
 * @package Core\Entity
 *
 * @property string $date
 * @property string $location
 * @property int $temperature
 * @property int $windSpeed
 * @property string $windDirection
 * @property array $attributes
 */
class Weather extends BaseEntity
{
    /**
     * @var array
     */
    protected $_attributes = [
        'date',
        'location',
        'temperature',
        'windSpeed',
        'windDirection'
    ];

    /**
     * @param $date
     * @throws \Exception
     */
    public function setDate($date)
    {
        $timestamp = strtotime($date);

        if ($timestamp === false) {
            throw new \Exception('Could not parse the date: ' . $date);
        }

        $this->set('date', date('Y-m-d', $timestamp));
    }

    public function setLocation($location)
    {
        $this->set('location', strtolower($location));
    }

    public function setWindDirection($direction)
    {
        $this->set('windDirection', strtolower($direction));
    }
}