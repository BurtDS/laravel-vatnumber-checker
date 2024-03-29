<?php

namespace Burtds\VatChecker;

use Illuminate\Support\Facades\Http;

class VatEuropeApi
{
    public function __construct(protected string $api)
    {
    }

    public function retrieveVatInstance(string $countryCode, string $vatNumber): VatInstance
    {
        $url = 'https://ec.europa.eu/taxation_customs/vies/rest-api/check-vat-number';

        $response = Http::post($url, [
            'countryCode' => $countryCode,
            'vatNumber' => $vatNumber,
        ]);

        $vatProperties = $response->json();

        return new VatInstance($vatProperties);
    }
}
