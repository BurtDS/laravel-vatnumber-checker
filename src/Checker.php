<?php

namespace Burtds\VatChecker;

class Checker
{
    public function __construct(protected VatEuropeApi $api)
    {

    }

    public function getRawVatInstance(string $countryCode, string $vatNumber)
    {
        //
        return json_encode($this->api->retreiveVatInstance($countryCode, $vatNumber)->vatobject);
    }

    public function getCompanyName(string $countryCode, string $vatNumber)
    {
        $vatInstance = $this->getRawVatInstance($countryCode, $vatNumber);
        return json_decode($vatInstance)->name;
    }

    public function getCompanyAddress(string $countryCode, string $vatNumber)
    {
        $vatInstance = $this->getRawVatInstance($countryCode, $vatNumber);
        return json_decode($vatInstance)->address;
    }
    public function isVatValid(string $countryCode, string $vatNumber)
    {
        $vatInstance = $this->getRawVatInstance($countryCode, $vatNumber);
        return json_decode($vatInstance)->valid;
    }
}
