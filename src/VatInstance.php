<?php

namespace Burtds\VatChecker;

class VatInstance
{
    public function __construct(public $vatobject)
    {

    }

    public function all()
    {
        return $this;
    }
}
