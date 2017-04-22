<?php



declare(strict_types=1);

namespace BrianFaust\PaymentDetails\Providers;

class CreditCard extends Provider
{
    public function getFields()
    {
        return ['type', 'number', 'name', 'expiration_date'];
    }
}
