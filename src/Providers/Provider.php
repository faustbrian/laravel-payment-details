<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\PaymentDetails\Providers;

/**
 * Class Provider.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
abstract class Provider
{
    /**
     * @return string
     */
    public function getIdentifier()
    {
        return snake_case($this->getName());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return class_basename($this->getClass());
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return static::class;
    }

    /**
     * @return mixed
     */
    abstract public function getFields();
}
