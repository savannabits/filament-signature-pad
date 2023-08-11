<?php

namespace Coolsam\SignaturePad\Forms\Components\Fields;

use Filament\Forms\Components\Field;
use Coolsam\SignaturePad\Forms\Concerns;

class SignaturePad extends Field
{
    use Concerns\HasSignaturePadAttributes;

    protected string $view = 'coolsam-signature-pad::forms.components.fields.signature-pad';
}
