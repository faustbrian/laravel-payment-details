<?php



declare(strict_types=1);

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
