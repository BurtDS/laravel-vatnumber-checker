<?php

namespace Burtds\VatChecker;

use Burtds\VatChecker\Facades\VatChecker;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class VatnumberCheckerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-vatnumber-checker');
    }

    public function packageBooted()
    {
        $this->app->bind(VatEuropeApi::class, function () {
            $api = 'https://ec.europa.eu/taxation_customs/vies/rest-api';

            return new VatEuropeApi($api);
        });
        $this->app->bind(Validator::class, function () {

            return new Validator();
        });

        $this->app->bind(VatChecker::class, function () {
            $api = app(VatEuropeApi::class);
            $validator = app(Validator::class);

            return new Checker($api, $validator);
        });
    }
}
