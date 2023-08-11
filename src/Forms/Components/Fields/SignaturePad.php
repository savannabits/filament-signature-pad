<?php

namespace Coolsam\SignaturePad\Forms\Components\Fields;

use Coolsam\SignaturePad\Forms\Concerns;
use Filament\Forms\Components\Field;

class SignaturePad extends Field
{
    use Concerns\HasSignaturePadAttributes;

    protected string $view = 'coolsam-signature-pad::forms.components.fields.signature-pad';
}
