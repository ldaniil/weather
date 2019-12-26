<?php

namespace Core\Source\Weather\Builder;

use Core\Weather;
use Core\Source\Weather\BuilderInterface;

class WeatherstackBuilder implements BuilderInterface
{
    public function build($data) :Weather
    {
        $data = json_decode($data, true);

        if (isset($data['success']) && $data['success'] == false) {
            throw new \Exception('Api ' . get_class($this) . ' error: ' . $data['error']['info']);
        }

        return new Weather(
            $data['current']['observation_time'],
            $data['location']['name'],
            $data['current']['temperature'],
            $data['current']['wind_speed'],
            $data['current']['wind_dir']
        );
    }
}