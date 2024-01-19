<?php

namespace Burtds\VatChecker\Facades;

use Illuminate\Support\Facades\Facade;

class VatChecker extends Facade
{
    protected static function getFacadeAccessor()
    {
        return VatChecker::class;
    }
}
