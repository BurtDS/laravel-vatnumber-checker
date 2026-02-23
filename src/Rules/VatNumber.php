<?php

namespace Burtds\VatChecker\Rules;

use Burtds\VatChecker\Facades\VatChecker;
use Illuminate\Contracts\Validation\ValidationRule;

class VatNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        try {
            $vatInstance = VatChecker::getRawVatInstance($value);
            $isValid = json_decode($vatInstance)->valid ?? false;
        } catch (\Throwable $th) {
            $isValid = false;
        }

        if (!$isValid) {
            $fail('The :attribute is not valid.');
        }
    }
}
