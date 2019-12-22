<?php

namespace Core\Source\Weather\Api;

use Core\Source\Weather\ApiInteface;

class WeatherstackApi implements ApiInteface
{
    /**
     * @param string $location
     * @return bool|string
     */
    public function getData(string $location)
    {
        return file_get_contents("http://api.weatherstack.com/current?access_key=9a69de7bd8edda81b966286d3269ef1b&query={$location}");
    }
}