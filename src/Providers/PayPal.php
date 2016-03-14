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
 * Class PayPal.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class PayPal extends Provider
{
    /**
     * @return array
     */
    public function getFields()
    {
        return ['email'];
    }
}
