<?php

use Burtds\VatChecker\Facades\VatChecker;

it('can get a valid VAT number', function () {
    $vatinstance = VatChecker::getVatinstance('BE','0749617582');
    expect($vatinstance->vatobject['valid'])->toBeTrue();
});


it('fails with invalid vat number', function () {
    $vatinstance = VatChecker::getVatinstance('BE','617582');
    expect($vatinstance->vatobject['valid'])->toBeFalse();
});
