<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\PaymentDetails\Providers;

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
