@php
    $extraAlpineAttributes = $getExtraAlpineAttributes();
    $id = $getId();
    $isConcealed = $isConcealed();
    $isDisabled = $isDisabled();
    $isPrefixInline = $isPrefixInline();
    $isSuffixInline = $isSuffixInline();
    $prefixActions = $getPrefixActions();
    $prefixIcon = $getPrefixIcon();
    $prefixLabel = $getPrefixLabel();
    $suffixActions = $getSuffixActions();
    $suffixIcon = $getSuffixIcon();
    $suffixLabel = $getSuffixLabel();
    $statePath = $getStatePath();
    $displayTemplate = $getDisplayTemplate();
@endphp
<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-load-css="[
            @js(\Filament\Support\Facades\FilamentAsset::getStyleHref('signature-pad-styles', \Coolsam\SignaturePad\Forms\Components\Fields\SignaturePad::PACKAGE_NAME)),
        ]"
        ax-load
        ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('signature-pad', \Coolsam\SignaturePad\Forms\Components\Fields\SignaturePad::PACKAGE_NAME) }}"
        x-data="signaturePad(
        $wire.{{ $applyStateBindingModifiers("entangle('{$getStatePath()}')") }},
        {
            disabled : {{$isDisabled ? 'true':'false'}},
            dotSize : '{{$getStrokeDotSize()}}',
            minWidth: '{{$getStrokeMinWidth()}}',
            maxWidth : '{{$getStrokeMaxWidth()}}',
            minDistance: '{{$getStrokeMinDistance()}}',
            penColor: '{{$getPenColor()}}',
            backgroundColor: '{{$getBackgroundColor()}}',
            id: '{{ $id }}',
        })"
        class="p-2 md:p-4 bg-white dark:bg-gray-500 sm:rounded-md">
        @if($displayTemplate)
            <template x-if="state">
                <img class="border mx-auto dark:border-gray-700 rounded-lg w-full max-w-[800px]" alt="current_signature" :src="state">
            </template>
        @endif
        @if(!($isReadOnly() || $isDisabled))
            <canvas
                before="Hello World"
                {{ \Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())
                    ->merge($extraAlpineAttributes, escape: false)
                    ->merge([
                        'disabled' => $isDisabled,
                        'id' => $id,
                        'x-ref' => 'canvas',
                        'x-model' => 'state',
                        'placeholder' => $getPlaceholder(),
                        'readonly' => $isReadOnly(),
                        'required' => $isRequired() && (! $isConcealed),
                    ], escape: false) }}
                style="max-height: 100px !important; max-width: 800px !important; border-style: dashed; border-width: initial"
                class="w-full h-full m-2 mx-auto border-dashed rounded-md dark:border-gray-700 before:content-[attr(before)]">
            </canvas>
            <div class="flex mt-2 justify-center space-x-2">
                <x-filament::button icon="heroicon-o-arrow-path" color="danger" outlined="true" size="sm" @click.prevent="resizeCanvas()">
                </x-filament::button>
                <template x-if="signaturePad">
                    <x-filament::button color="danger" outlined="true" size="sm" @click.prevent="clear()">
                        {{__('signature-pad::signature-pad.clear')}}
                    </x-filament::button>
                </template>
                @if(!$isDisabledDownload())
                    <x-filament::button color="primary" outlined="true" size="sm" icon="heroicon-o-arrow-down-on-square"
                                        @click.prevent="downloadSVG()">.svg
                    </x-filament::button>
                    <x-filament::button color="primary" outlined="true" size="sm" icon="heroicon-o-arrow-down-on-square"
                                        @click.prevent="downloadPNG()">.png
                    </x-filament::button>
                    <x-filament::button color="primary" outlined="true" size="sm" icon="heroicon-o-arrow-down-on-square"
                                        @click.prevent="downloadJPG()">.jpg
                    </x-filament::button>
                @endif
            </div>
        @endif
    </div>
</x-dynamic-component>
