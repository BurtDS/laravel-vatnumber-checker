<?php

namespace Burtds\VatChecker;

class Checker
{
    public function __construct(protected VatEuropeApi $api)
    {

    }

    public function getVatinstance(string $countryCode, string $vatNumber)
    {
        $vat = $this->api->retreiveVatInstance($countryCode, $vatNumber);

        return $vat->all();
    }
}
