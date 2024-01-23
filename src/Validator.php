<?php

namespace Burtds\VatChecker;

use Burtds\VatChecker\Exceptions\VatNumberNotFound;

class Validator
{
    public function __construct()
    {

    }

    /**
     * Checking weither a Vat Checker API response is valid,
     * based on the $currencies array.
     *
     *
     * @return bool
     */
    public function isValidVatNumber($vatInstance, string $vatNumber)
    {
        return (json_decode($vatInstance)->valid) ? true : throw VatNumberNotFound::make($vatNumber);
    }
}
