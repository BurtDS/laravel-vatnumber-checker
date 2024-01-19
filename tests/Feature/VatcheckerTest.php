<?php

use Burtds\VatChecker\Facades\VatChecker;

it('can get a valid VAT number', function () {
    $vatinstance = VatChecker::getVatinstance('BE','0749617582');
    expect(json_decode($vatinstance)->valid)->toBeTrue();
});


it('fails with invalid vat number', function () {
    $vatinstance = VatChecker::getVatinstance('BE','617582');
    expect(json_decode($vatinstance)->valid)->toBeFalse();
});
