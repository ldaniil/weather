<?php

namespace Core;

/**
 * Class Weather
 * @package Core
 *
 */
class Weather
{
    private $_date;

    private $_location;

    private $_temperature;

    private $_windSpeed;

    private $_windDirection;

    public function __construct(string $date, string $location, int $temperature, int $windSpeed, string $windDirection)
    {
        $this->setDate($date);
        $this->setLocation($location);
        $this->setWindDirection($windDirection);

        $this->_temperature = $temperature;
        $this->_windSpeed = $windSpeed;
    }

    public function getDate()
    {
        return $this->_date;
    }

    public function getLocation()
    {
        return $this->_location;
    }

    public function getTemerature()
    {
        return $this->_temperature;
    }

    public function getWindDirection()
    {
        return $this->_windDirection;
    }

    public function getWindSpeed()
    {
        return $this->_windSpeed;
    }

    public function toArray() :array
    {
        return [
            'date' => $this->_date,
            'location' => $this->_location,
            'temperature' => $this->_temperature,
            'windDirection' => $this->_windDirection,
            'windSpeed' => $this->_windSpeed
        ];
    }

    /**
     * @param $date
     * @throws \Exception
     */
    private function setDate(string $date)
    {
        $timestamp = strtotime($date);

        if ($timestamp === false) {
            throw new \Exception('Could not parse the date: ' . $date);
        }

        $this->_date = date('Y-m-d', $timestamp);
    }

    private function setLocation(string $location)
    {
        $this->_location = strtolower($location);
    }

    private function setWindDirection(string $direction)
    {
        $this->_windDirection = strtolower($direction);
    }
}