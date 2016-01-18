<?php

namespace DraperStudio\PaymentDetails\Providers;

class CreditCard extends Provider
{
    public function getFields()
    {
        return ['type', 'number', 'name', 'expiration_date'];
    }
}
