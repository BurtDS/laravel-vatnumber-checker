<?php

namespace Burtds\VatChecker;

class Checker
{
    public function __construct(protected VatEuropeApi $api, protected Validator $validator)
    {

    }

    /**
     * Retreives a known VAT Object for a given CountryCode & VatNumber.
     *
     * @return json
     */
    public function getRawVatInstance(string $countryCode, string $vatNumber)
    {
        // Grab the VatObject returned by the API
        $vatObject = json_encode($this->api->retreiveVatInstance($countryCode, $vatNumber)->vatobject);

        // Check validity of the Object
        $this->validator->isValidVatNumber($vatObject, $vatNumber);

        // Return the VatObject
        return $vatObject;
    }

    /**
     * Retreives the Company Name of a known VAT Object for a given CountryCode & VatNumber.
     *
     * @return string
     */
    public function getCompanyName(string $countryCode, string $vatNumber)
    {
        // Fetch the VatObject
        $vatObject = $this->getRawVatInstance($countryCode, $vatNumber);

        // Return the Vat Objects company name
        return json_decode($vatObject)->name;
    }

    /**
     * Retreives the Company address of a known VAT Object for a given CountryCode & VatNumber.
     *
     * @return string
     */
    public function getCompanyAddress(string $countryCode, string $vatNumber)
    {
        // Fetch the VatObject
        $vatObject = $this->getRawVatInstance($countryCode, $vatNumber);

        // Return the Vat Objects address
        return json_decode($vatObject)->address;
    }

    /**
     * Retreives the validity of a given CountryCode & VatNumber.
     *
     * @return string
     */
    public function isVatValid(string $countryCode, string $vatNumber)
    {
        // Fetch the VatObject
        $vatObject = $this->getRawVatInstance($countryCode, $vatNumber);

        // Return it's validity
        return json_decode($vatObject)->valid;
    }
}
