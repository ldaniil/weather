<?php

namespace Core\Source\Weather;

use Core\Weather;

interface BuilderInterface
{
    public function build($data) :Weather;
}