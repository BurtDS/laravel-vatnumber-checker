[![Latest Version on Packagist](https://img.shields.io/packagist/v/burtds/laravel-vatnumber-checker.svg?style=flat-square)](https://packagist.org/packages/burtds/laravel-vatnumber-checker)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/burtds/laravel-vatnumber-checker/run-tests-pest.yml?branch=main&label=Tests)](https://github.com/burtds/laravel-vatnumber-checker/actions/workflows/run-tests-pest.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/burtds/laravel-vatnumber-checker.svg?style=flat-square)](https://packagist.org/packages/burtds/laravel-vatnumber-checker)

## About laravel-vatnumber-checker

A small package that allows you to easily retrieve information associated with a VAT number.
Verification of validity, company name, and address of the company is only one api call away.

## How to use laravel-vatnumber-checker

### Installation

You can install the package via composer:
```bash
composer require burtds/laravel-vatnumber-checker
```
Afterwords, you're able to fetch your desired information.

### Usage

This packages uses an API provided by the European Commission called "[VIES](https://ec.europa.eu/taxation_customs/vies/#/vat-validation)".

We'll need to import the Facade of this package on top of your file.
```php
use Burtds\VatChecker\Facades\VatChecker
```
Once that is done, you'll be able to use the providede functions.
For this example we're using the VAT Number of Vulpo BV.
```php
VatChecker::getRawVatInstance('BE','0749617582'); // returns a raw response of the European Commission's API.
VatChecker::isVatValid('BE','0749617582'); // returns the validity of a VAT Number.
VatChecker::getCompanyName('BE','0749617582'); // returns the company name related to the VAT Number.
VatChecker::getCompanyAddress('BE','0749617582'); // returns the company address related to the VAT Number.
```

### Test & Format
For testing you can run:
```bash
composer test
```
For formatting the code using pint you can run:
```bash
composer format
```

## Security Vulnerabilities

If you discover a security vulnerability within this package, please send me an e-mail via [bert@bert.gent](mailto:bert@bert.gent). 
I'll get back at you as soon as possible.

## Credits

- [Bert De Swaef](https://github.com/burtds)
- [All Contributors](../../contributors)

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
