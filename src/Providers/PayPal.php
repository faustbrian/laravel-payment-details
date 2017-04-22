<?php



declare(strict_types=1);

namespace BrianFaust\PaymentDetails\Providers;

class PayPal extends Provider
{
    public function getFields()
    {
        return ['email'];
    }
}
