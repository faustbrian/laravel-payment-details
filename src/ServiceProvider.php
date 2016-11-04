<?php

namespace BrianFaust\PaymentDetails;

class ServiceProvider extends \BrianFaust\ServiceProvider\ServiceProvider
{
    public function boot()
    {
        $this->publishConfig();

        $this->publishMigrations();
    }

    public function register()
    {
        parent::register();

        $this->mergeConfig();
    }

    public function getPackageName()
    {
        return 'payment-details';
    }
}
