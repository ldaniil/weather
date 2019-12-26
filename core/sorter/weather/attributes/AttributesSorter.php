<?php

namespace Core\Sorter\Weather\Attributes;

use Core\Weather;

/**
 * Class AttributesSorter
 * @package Core\Sorter\Weather
 */
class AttributesSorter
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

        $diff = array_diff(array_keys($weather->toArray()), array_keys($attributes));

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