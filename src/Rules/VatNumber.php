<?php

namespace Burtds\VatChecker\Rules;

use Burtds\VatChecker\Facades\VatChecker;
use Illuminate\Contracts\Validation\Rule;

class VatNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $vatInstance = VatChecker::getRawVatInstance($value);
        } catch (\Throwable $th) {
            return false;
        }

        return json_decode($vatInstance)->valid;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not valid.';
    }
}
