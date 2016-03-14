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
 * Class CreditCard.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class CreditCard extends Provider
{
    /**
     * @return array
     */
    public function getFields()
    {
        return ['type', 'number', 'name', 'expiration_date'];
    }
}
