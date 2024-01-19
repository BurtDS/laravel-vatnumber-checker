<?php

namespace Burtds\VatChecker;

class Checker
{
    public function __construct(protected VatEuropeApi $api)
    {

    }

    public function getVatinstance(string $countryCode, string $vatNumber)
    {
        return json_encode($this->api->retreiveVatInstance($countryCode, $vatNumber)->vatobject);
    }
}
