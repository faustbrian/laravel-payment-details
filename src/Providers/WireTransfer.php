<?php

namespace BrianFaust\PaymentDetails\Providers;

class WireTransfer extends Provider
{
    public function getFields()
    {
        return ['holder', 'bank', 'iban', 'bic'];
    }
}
