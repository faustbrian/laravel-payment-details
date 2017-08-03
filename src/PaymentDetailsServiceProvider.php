<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Payment Details.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\PaymentDetails;

use Illuminate\Support\ServiceProvider;

class PaymentDetailsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-payment-details.php' => config_path('laravel-payment-details.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-payment-details.php', 'laravel-payment-details');
    }
}
