<?php

namespace DraperStudio\PaymentDetails;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'payment-details';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishConfig()
             ->publishMigrations()
             ->mergeConfig($this->packageName);
    }
}
