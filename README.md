
[![Latest Version on Packagist](https://img.shields.io/packagist/v/burtds/cash-converter.svg?style=flat-square)](https://packagist.org/packages/burtds/cash-converter)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/burtds/cash-converter/run-tests-pest.yml?branch=main&label=Tests)](https://github.com/burtds/cash-converter/actions/workflows/run-tests-pest.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/burtds/cash-converter.svg?style=flat-square)](https://packagist.org/packages/burtds/cash-converter)

## About cash-converter

A small & simple package, but takes away the pain of communicating with an API directly to convert a certain amount of cash between 2 currencies. 
You can also get the conversion rate or an array with all known conversion rates based on a certain currency.

## How to use cash-converter

### Installation

You can install the package via composer:
```bash
composer require burtds/cash-converter
```
Afterwords, we'll need to publish the service provider.
```bash
php artisan vendor:publish --provider="Burtds\CashConverter\CashConverterProvider"
```

### Usage

First of all we'll add the API key of the service we're using to our `.env` file of our project.
If you don't have an account yet on [exchangerate-api.com](https://exchangerate-api.com), you should create one.
Once you have an account you can copy your API key from the dashboard page and put it into you `.env` file.
```
EXCHANGE_RATE_API_KEY="YOUR-API-KEY"
```
We'll need to import the Facade of this package on top of your file.
```php
use Burtds\CashConverter\Facades\CashConverter;
```
Once that is done, you'll be able to use the conversion functions.
```php
CashConverter::getRates('EUR'); // returns an array of the currenct converison rates based on the given currency, in this case Euro's
CashConverter::getRate('EUR','USD'); // returns the currenct conversion rate for Euro to US Dollars
CashConverter::convert('EUR','USD', 25); // returns the converted vanlue in US Dollars for the given 25 Euros
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

And u huge thanks to [Freek Van der Herten](https://github.com/freekmurze) for the guidance.

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
