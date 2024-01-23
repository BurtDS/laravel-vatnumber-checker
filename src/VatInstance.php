<?php

namespace Burtds\VatChecker;

class VatInstance
{
    public function __construct(public $vatObject)
    {

    }

    public function all(): self
    {
        return $this;
    }
}
