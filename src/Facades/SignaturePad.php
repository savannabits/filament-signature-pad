<?php

namespace Coolsam\SignaturePad\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Coolsam\SignaturePad\SignaturePad
 */
class SignaturePad extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Coolsam\SignaturePad\SignaturePad::class;
    }
}
