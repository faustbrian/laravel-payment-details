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
 * Class WireTransfer.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class WireTransfer extends Provider
{
    /**
     * @return array
     */
    public function getFields()
    {
        return ['holder', 'bank', 'iban', 'bic'];
    }
}
