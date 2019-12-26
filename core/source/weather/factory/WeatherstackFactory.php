<?php

namespace Core\Source\Weather\Factory;

use Core\Source\Weather\ApiInteface;
use Core\Source\Weather\FactoryInterface;
use Core\Source\Weather\BuilderInterface;
use Core\Source\Weather\Api\WeatherstackApi;
use Core\Source\Weather\Builder\WeatherstackBuilder;

/**
 * Class WeatherstackFactory
 * @package Core\Source\Weather\Factory
 */
class WeatherstackFactory implements FactoryInterface
{
    /**
     * @return ApiInteface
     */
    public function getApi() :ApiInteface
    {
        return new WeatherstackApi();
    }

    /**
     * @return BuilderInterface
     */
    public function getBuilder() :BuilderInterface
    {
        return new WeatherstackBuilder();
    }
}