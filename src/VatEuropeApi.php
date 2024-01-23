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
        // $url = "{$this->api}/check-vat-number";
        $url = 'https://ec.europa.eu/taxation_customs/vies/rest-api/check-vat-number';

        $response = Http::post($url, [
            'countryCode' => $countryCode,
            'vatNumber' => $vatNumber,
        ]);

        $x = $response->json();

        return new VatInstance($x);
    }
}
