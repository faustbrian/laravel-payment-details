<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\PaymentDetails\Providers;

class BankTransfer extends Provider
{
    public function getFields()
    {
        return ['holder', 'bank', 'account_number', 'bank_code'];
    }
}
