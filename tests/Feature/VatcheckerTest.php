<?php

use Burtds\VatChecker\Exceptions\CountryCodeNotSupported;
use Burtds\VatChecker\Exceptions\VatNumberNotFound;
use Burtds\VatChecker\Facades\VatChecker;

beforeEach(function () {
    $this->validVatNumber = '0749617582'; // Vulpo's VAT Number
});

it('can get a valid VAT number', function () {
    $vatInstance = VatChecker::getRawVatInstance('BE', $this->validVatNumber);
    expect(json_decode($vatInstance)->valid)->toBeTrue();
});

it('can get the company name from a valid vat number', function () {
    $name = VatChecker::getCompanyName('BE', $this->validVatNumber);
    expect($name)->toBeString();
});

it('can get the company address from a valid vat number', function () {
    $address = VatChecker::getCompanyAddress('BE', $this->validVatNumber);
    expect($address)->toBeString();
});

it('can get a valid state for a valid vat number', function () {
    $isValid = VatChecker::isVatValid('BE', $this->validVatNumber);
    expect($isValid)->toBeTrue();
});

it('fails with invalid vat number', function () {
    $invalidVatNumber = '1234567890';
    $vatInstance = VatChecker::getRawVatInstance('BE', $invalidVatNumber);
})->throws(VatNumberNotFound::class);

it('can get a valid VAT number, from a single value', function () {
    $vatInstance = VatChecker::getRawVatInstance('BE'.$this->validVatNumber);
    expect(json_decode($vatInstance)->valid)->toBeTrue();
});

it('fails with Country Code Not Supported Exception due to a not support Country Code', function () {
    $vatInstance = VatChecker::getRawVatInstance('XX'.$this->validVatNumber);
})->throws(CountryCodeNotSupported::class);
