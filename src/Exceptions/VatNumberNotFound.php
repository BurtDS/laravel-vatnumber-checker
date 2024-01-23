<?php

namespace Burtds\VatChecker\Exceptions;

use Exception;

class VatNumberNotFound extends Exception
{
    public static function make(string $vatNumber): self
    {
        return new static("Given VAT number `{$vatNumber}` not found / is invalid ");
    }
}
