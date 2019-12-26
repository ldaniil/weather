<?php

namespace Core\Source\Weather;

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