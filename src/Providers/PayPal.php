<?php

namespace DraperStudio\PaymentDetails\Providers;

class PayPal extends Provider
{
    public function getFields()
    {
        return ['email'];
    }
}
