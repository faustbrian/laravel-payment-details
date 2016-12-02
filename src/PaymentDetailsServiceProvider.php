<?php

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\PaymentDetails;

use BrianFaust\ServiceProvider\ServiceProvider;

class PaymentDetailsServiceProvider extends ServiceProvider
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
