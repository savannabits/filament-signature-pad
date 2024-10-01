<?php

namespace Coolsam\SignaturePad\Forms\Components\Fields;

use Coolsam\SignaturePad\Forms\Concerns\HasSignaturePadAttributes;
use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;
use Filament\Forms\Components\Field;
use Filament\Support\Concerns\HasExtraAlpineAttributes;

class SignaturePad extends Field implements Contracts\CanBeLengthConstrained, Contracts\HasAffixActions
{
    use Concerns\CanBeAutocapitalized;
    use Concerns\CanBeAutocompleted;
    use Concerns\CanBeLengthConstrained;
    use Concerns\CanBeReadOnly;
    use Concerns\HasAffixes;
    use Concerns\HasExtraInputAttributes;
    use Concerns\HasInputMode;
    use Concerns\HasPlaceholder;
    use HasExtraAlpineAttributes;
    use HasSignaturePadAttributes;

    const PACKAGE_NAME = 'coolsam/signature-pad';

    protected string $view = 'coolsam-signature-pad::forms.components.fields.signature-pad';
}
