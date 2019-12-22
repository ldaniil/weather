<?php

namespace Core\Strategy\Weather;

use Core\Entity\Weather;

/**
 * Class AttributesOrder
 * @package Core\Strategy\Weather
 */
class AttributesOrder
{
    /**
     * @var AttributesOrderInterface
     */
    protected $order;

    /**
     * AttributesOrder constructor.
     * @param AttributesOrderInterface $order
     */
    public function __construct(AttributesOrderInterface $order)
    {
        $this->setOrder($order);
    }

    /**
     * @param Weather $weather
     * @return array
     * @throws \Exception
     */
    public function sort(Weather $weather) :array
    {
        $attributes = $this->order->sort($weather);

        $diff = array_diff($weather->attributes, array_keys($attributes));

        if ($diff) {
            throw new \Exception('Order ' . get_class($this->order) . ' undefined attributes names: ' . implode(', ', $diff));
        }

        return $attributes;
    }

    /**
     * @param AttributesOrderInterface $order
     * @return $this
     */
    public function setOrder(AttributesOrderInterface $order)
    {
        $this->order = $order;
        return $this;
    }
}