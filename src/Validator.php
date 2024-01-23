<?php

namespace Burtds\VatChecker;

use Burtds\VatChecker\Exceptions\VatNumberNotFound;

class Validator
{
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
