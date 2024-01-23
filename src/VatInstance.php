<?php

namespace Burtds\VatChecker;

class VatInstance
{
    public function __construct(public array $vatProperties)
    {
    }

    public function all(): self
    {
        return $this;
    }
}
