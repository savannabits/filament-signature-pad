<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="signaturePadComponent({
        state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
        signaturePadId: $id('signature'),
        disabled : {{$isDisabled() ? 'true':'false'}},
        dotSize : '{{$getStrokeDotSize()}}',
        minWidth: '{{$getStrokeMinWidth()}}',
        maxWidth : '{{$getStrokeMaxWidth()}}',
        minDistance: '{{$getStrokeMinDistance()}}',
        penColor: '{{$getPenColor()}}',
        backgroundColor: '{{$getBackgroundColor()}}'
    })" @resize.window="resizeCanvas" class="bg-white">
        @if($isDisabled())
            <img class="w-full h-full border-2 border-gray-300 border-dashed rounded-md" :src="state" alt="sig">
        @else
            <canvas x-ref="canvas" class="w-full h-full border-2 border-gray-300 border-dashed rounded-md"></canvas>

            <div class="flex mt-2 justify-end space-x-2">
                <x-filament::button color="danger"  outlined="true" size="sm" @click.prevent="clear()">Clear</x-filament::button>
                @if(!$isDisabledDownload())
                    <x-filament::button color="primary" outlined="true" size="sm" icon="heroicon-o-download" @click.prevent="downloadSVG()">.svg</x-filament::button>
                    <x-filament::button color="primary" outlined="true" size="sm" icon="heroicon-o-download" @click.prevent="downloadPNG()">.png</x-filament::button>
                    <x-filament::button color="primary" outlined="true" size="sm" icon="heroicon-o-download" @click.prevent="downloadJPG()">.jpg</x-filament::button>
                @endif
            </div>
        @endif
    </div>
</x-dynamic-component>
