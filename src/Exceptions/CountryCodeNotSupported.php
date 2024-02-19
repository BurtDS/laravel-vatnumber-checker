<?php

namespace Burtds\VatChecker\Exceptions;

use Exception;

class CountryCodeNotSupported extends Exception
{
    public static function make(string $countryCode)
    {
        return new static("Given countryCode `{$countryCode}` is not supported");
    }
}
