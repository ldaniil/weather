<?php

namespace Core\Source\Weather;

use Core\Builder\Weather\BuilderInterface;

/**
 * Interface FactoryInterface
 * @package Core\Source\Weather
 */
interface FactoryInterface
{
    /**
     * @return ApiInteface
     */
    public function getApi() :ApiInteface;

    /**
     * @return BuilderInterface
     */
    public function getBuilder() :BuilderInterface;
}