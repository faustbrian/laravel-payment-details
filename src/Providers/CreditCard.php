<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\PaymentDetails\Providers;

class CreditCard extends Provider
{
    public function getFields()
    {
        return ['type', 'number', 'name', 'expiration_date'];
    }
}
