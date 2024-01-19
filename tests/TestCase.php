<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Burtds\VatChecker\VatnumberCheckerServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            VatnumberCheckerServiceProvider::class,
        ];
    }
}
