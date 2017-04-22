<?php



declare(strict_types=1);

namespace BrianFaust\PaymentDetails\Providers;

class Payoneer extends Provider
{
    public function getFields()
    {
        return ['email'];
    }
}
