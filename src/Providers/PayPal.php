<?php

namespace BrianFaust\PaymentDetails\Providers;

class PayPal extends Provider
{
    public function getFields()
    {
        return ['email'];
    }
}
