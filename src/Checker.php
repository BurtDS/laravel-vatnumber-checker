<?php

namespace Burtds\VatChecker;

class Checker
{
    public function __construct(
        protected VatEuropeApi $api,
        protected Validator $validator
    ) {}

    /**
     * Retrieves a known VAT Object for a given CountryCode & VatNumber.
     */
    public function getRawVatInstance(string $countryCode, string $vatNumber): string
    {
        $vatInstance = $this->api->retrieveVatInstance($countryCode, $vatNumber);

        $vatObject = json_encode($vatInstance->vatObject);

        // Check validity of the Object
        $this->validator->ensureValidVatNumber($vatObject, $vatNumber);

        // Return the VatObject
        return $vatObject;
    }

    /**
     * Retrieves the Company Name of a known VAT Object for a given CountryCode & VatNumber.
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
     * Retrieves the Company address of a known VAT Object for a given CountryCode & VatNumber.
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
     * Retrieves the validity of a given CountryCode & VatNumber.
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
