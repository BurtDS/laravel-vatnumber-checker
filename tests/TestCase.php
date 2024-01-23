<?php

namespace Tests;

use Burtds\VatChecker\VatnumberCheckerServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            VatnumberCheckerServiceProvider::class,
        ];
    }
}
