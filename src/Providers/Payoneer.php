<?php

namespace DraperStudio\PaymentDetails\Providers;

class Payoneer extends Provider
{
    public function getFields()
    {
        return ['email'];
    }
}
