<?php

namespace Core\Source\Weather\Builder;

use Core\Entity\Weather;
use Core\Builder\Weather\WeatherBuilder;

class WeatherstackBuilder extends WeatherBuilder
{
    public function create($data) :Weather
    {
        $data = json_decode($data, true);

        if (isset($data['success']) && $data['success'] == false) {
            throw new \Exception('Api ' . get_class($this) . ' error: ' . $data['error']['info']);
        }

        $attributes = [
            'date' => $data['current']['observation_time'],
            'location' => $data['location']['name'],
            'temperature' => $data['current']['temperature'],
            'windSpeed' => $data['current']['wind_speed'],
            'windDirection' => $data['current']['wind_dir']
        ];

        return $this->build($attributes);
    }
}