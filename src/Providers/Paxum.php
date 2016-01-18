<?php

namespace DraperStudio\PaymentDetails\Providers;

class Paxum extends Provider
{
    public function getFields()
    {
        return ['email'];
    }
}
