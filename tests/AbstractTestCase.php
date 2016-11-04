<?php

namespace BrianFaust\Tests\PaymentDetails;

use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return \BrianFaust\PaymentDetails\ServiceProvider::class;
    }
}
