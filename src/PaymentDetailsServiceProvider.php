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

use BrianFaust\ServiceProvider\AbstractServiceProvider;

class PaymentDetailsServiceProvider extends AbstractServiceProvider
{
    public function boot(): void
    {
        $this->publishConfig();

        $this->publishMigrations();
    }

    public function register(): void
    {
        parent::register();

        $this->mergeConfig();
    }

    public function getPackageName(): string
    {
        return 'payment-details';
    }
}
