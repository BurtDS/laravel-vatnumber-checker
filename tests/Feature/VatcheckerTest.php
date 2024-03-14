<?php

use Illuminate\Support\Facades\Http;
use Burtds\VatChecker\Facades\VatChecker;
use Burtds\VatChecker\Exceptions\VatNumberNotFound;
use Burtds\VatChecker\Exceptions\CountryCodeNotSupported;



beforeEach(function () {
    $this->validVatNumber = '0749617582'; // Vulpo's VAT Number
    $this->validResponse = '{
        "countryCode": "BE",
        "vatNumber": "0749617582",
        "requestDate": "2024-03-13T14:46:18.456Z",
        "valid": true,
        "requestIdentifier": "",
        "name": "BV VULPO",
        "address": "Brusselsesteenweg 81\n9230 Wetteren",
        "traderName": "---",
        "traderStreet": "---",
        "traderPostalCode": "---",
        "traderCity": "---",
        "traderCompanyType": "---",
        "traderNameMatch": "NOT_PROCESSED",
        "traderStreetMatch": "NOT_PROCESSED",
        "traderPostalCodeMatch": "NOT_PROCESSED",
        "traderCityMatch": "NOT_PROCESSED",
        "traderCompanyTypeMatch": "NOT_PROCESSED"
    }'; // Valid response
    $this->invalidResponse = '{
        "countryCode": "BE",
        "vatNumber": "1234567890",
        "requestDate": "2024-03-13T14:48:59.943Z",
        "valid": false,
        "requestIdentifier": "",
        "name": "---",
        "address": "---",
        "traderName": "---",
        "traderStreet": "---",
        "traderPostalCode": "---",
        "traderCity": "---",
        "traderCompanyType": "---",
        "traderNameMatch": "NOT_PROCESSED",
        "traderStreetMatch": "NOT_PROCESSED",
        "traderPostalCodeMatch": "NOT_PROCESSED",
        "traderCityMatch": "NOT_PROCESSED",
        "traderCompanyTypeMatch": "NOT_PROCESSED"
    }'; // Invalid response

});

it('can get a valid VAT number', function () {
    Http::fake([
        'https://ec.europa.eu/*' => Http::response($this->validResponse)
    ]);
    $vatInstance = VatChecker::getRawVatInstance('BE', $this->validVatNumber);
    expect(json_decode($vatInstance)->valid)->toBeTrue();
});

it('can get the company name from a valid vat number', function () {
    Http::fake([
        'https://ec.europa.eu/*' => Http::response($this->validResponse)
    ]);
    $name = VatChecker::getCompanyName('BE', $this->validVatNumber);
    expect($name)->toBeString();
});

it('can get the company address from a valid vat number', function () {
    Http::fake([
        'https://ec.europa.eu/*' => Http::response($this->validResponse)
    ]);
    $address = VatChecker::getCompanyAddress('BE', $this->validVatNumber);
    expect($address)->toBeString();
});

it('can get a valid state for a valid vat number', function () {
    Http::fake([
        'https://ec.europa.eu/*' => Http::response($this->validResponse)
    ]);
    $isValid = VatChecker::isVatValid('BE', $this->validVatNumber);
    expect($isValid)->toBeTrue();
});

it('fails with invalid vat number', function () {
    $invalidVatNumber = '1234567890';
    Http::fake([
        'https://ec.europa.eu/*' => Http::response($this->invalidResponse)
    ]);
    $vatInstance = VatChecker::getRawVatInstance('BE', $invalidVatNumber);
})->throws(VatNumberNotFound::class);

it('can get a valid VAT number, from a single value', function () {
    Http::fake([
        'https://ec.europa.eu/*' => Http::response($this->validResponse)
    ]);
    $vatInstance = VatChecker::getRawVatInstance('BE'.$this->validVatNumber);
    expect(json_decode($vatInstance)->valid)->toBeTrue();
});

it('fails with Country Code Not Supported Exception due to a not support Country Code', function () {
    $vatInstance = VatChecker::getRawVatInstance('XX'.$this->validVatNumber);
})->throws(CountryCodeNotSupported::class);
