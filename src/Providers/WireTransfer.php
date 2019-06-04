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

class WireTransfer extends Provider
{
    public function getFields()
    {
        return ['holder', 'bank', 'iban', 'bic'];
    }
}
