<?php

namespace Burtds\VatChecker;

use Burtds\VatChecker\Exceptions\VatNumberNotFound;
use Burtds\VatChecker\Exceptions\CountryCodeNotSupported;

class Validator
{

    public array $supportCountryCodes = [
        'AT',
        'BE',
        'BG',
        'CY',
        'CZ',
        'DE',
        'DK',
        'EE',
        'EL',
        'ES',
        'FI',
        'FR',
        'HR',
        'HU',
        'IE',
        'IT',
        'LT',
        'LU',
        'LV',
        'MT',
        'NL',
        'PL',
        'PT',
        'RO',
        'SE',
        'SI',
        'SK',
        'XI',
    ];

    /**
     * Checking weither a given Country Code is a known supported Country Code,
     * based on the $supportCountryCodes array.
     */
    public function isExistingCountryCode(string $countryCode): bool
    {
        return (in_array($countryCode, $this->supportCountryCodes, true)) ? true : throw CountryCodeNotSupported::make($countryCode);
    }

    /**
     * Checking whether a Vat Checker API response is valid,
     * based on the $currencies array.
     */
    public function ensureValidVatNumber($vatInstance, string $vatNumber): void
    {
        if (! json_decode($vatInstance)->valid) {
            throw VatNumberNotFound::make($vatNumber);
        }
    }

}
