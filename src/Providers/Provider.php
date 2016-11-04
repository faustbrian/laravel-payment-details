<?php

namespace BrianFaust\PaymentDetails\Providers;

abstract class Provider
{
    public function getIdentifier()
    {
        return snake_case($this->getName());
    }

    public function getName()
    {
        return class_basename($this->getClass());
    }

    public function getClass()
    {
        return static::class;
    }

    abstract public function getFields();
}
