<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        wire:ignore
        ax-load
        x-load-css="[
            @js(\Filament\Support\Facades\FilamentAsset::getStyleHref('signature-pad-styles', 'coolsam/signature-pad')),
        ]"
        ax-load-src="{{ \Filament\Support\Facades\FilamentAsset::getAlpineComponentSrc('signature-pad', 'coolsam/signature-pad') }}"
        x-data="signaturePad({
        state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
        disabled : {{$isDisabled() ? 'true':'false'}},
        dotSize : '{{$getStrokeDotSize()}}',
        minWidth: '{{$getStrokeMinWidth()}}',
        maxWidth : '{{$getStrokeMaxWidth()}}',
        minDistance: '{{$getStrokeMinDistance()}}',
        penColor: '{{$getPenColor()}}',
        backgroundColor: '{{$getBackgroundColor()}}'
    })" class="p-2 md:p-4 bg-white dark:bg-gray-700 sm:rounded-md">
        <template x-show="state">
            <img
                class="w-full h-full border-2 dark:border-gray-800 border-dashed rounded-md" :src="state"
                alt="sig">
        </template>
        <canvas
            x-ref="canvas"
            style="max-height: 200px !important; max-width: 800px !important; border-style: dashed; border-width: initial"
            class="w-full h-full m-2 mx-auto border-dotted rounded-md dark:border-gray-800"></canvas>
        <div class="flex mt-2 justify-center space-x-2">
            <x-filament::button x-if="!signaturePad?.isEmpty()" color="danger" outlined="true" size="sm" @click.prevent="clear()">
                {{__('signature-pad::signature-pad.clear')}}
            </x-filament::button>
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

    </div>
</x-dynamic-component>
