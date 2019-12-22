<?php

namespace Core\Entity;

/**
 * Class BaseEntity
 * @package Core\Entity
 */
class BaseEntity
{
    /**
     * @var array
     */
    protected $_attributes = [];

    /**
     * @var array
     */
    public $_values = [];

    /**
     * @param $name
     * @param $value
     * @throws \Exception
     */
    public function __set($name, $value)
    {
        $setter = 'set' . ucfirst($name);

        if (method_exists($this, $setter))
        {
            $this->{$setter}($value);
        } else {
            if (!in_array($name, $this->_attributes)) {
                throw new \Exception('Set undefined property ' . $name);
            }

            $this->set($name, $value);
        }
    }

    /**
     * @param $name
     * @return mixed
     * @throws \Exception
     */
    public function __get($attribute)
    {
        $getter = 'get' . ucfirst($attribute);

        if (method_exists($this, $getter)) {
            return $this->{$getter}();
        }

        if (!in_array($attribute, $this->_attributes)) {
            throw new \Exception('Get undefined property ' . $attribute);
        }

        return $this->_values[$attribute] ?? null;
    }

    public function __isset($name)
    {
        return array_key_exists($name, $this->_values) && !is_null($this->_values[$name]);
    }

    public function getAttributes() :array
    {
        return $this->_attributes;
    }

    protected function set($attribute, $value)
    {
        $this->_values[$attribute] = $value;
    }
}