<?php

namespace BrianFaust\PaymentDetails\Providers;

class BankTransfer extends Provider
{
    public function getFields()
    {
        return ['holder', 'bank', 'account_number', 'bank_code'];
    }
}
