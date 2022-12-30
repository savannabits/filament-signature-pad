<?php

/*test('signature pad field is instantiated with the correct name', function () {
    expect(\Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad::make('signature')->getName())->toBe('signature');
});*/

test('can set signature pad stroke minimum width', function () {
    $pad = \Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad::make('signature');
    expect($pad->strokeMinWidth(3.5))
        ->toBe($pad)
        ->and($pad->getStrokeMinWidth())
        ->toBe(3.5);
});

test('can set signature pad dot size', function () {
    $pad = \Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad::make('signature');
    expect($pad->strokeDotSize(3.5))
        ->toBe($pad)
        ->and($pad->getStrokeDotSize())
        ->toBe(3.5);
});

test('can set signature pad stroke maximum width', function () {
    expect(\Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad::make('signature')
        ->strokeMaxWidth(3.5)
        ->getStrokeMaxWidth())->toBe(3.5);
});

test('can set signature pad stroke minimum distance', function () {
    expect(\Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad::make('signature')
        ->strokeMinDistance(1.0)
        ->getStrokeMinDistance())->toBe(1.0);
});

test('can set signature pad pen color', function () {
    expect(\Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad::make('signature')
        ->penColor('rgb(255,280,100)')
        ->getPenColor())->toBe('rgb(255,280,100)');
});
test('can set signature pad background color', function () {
    expect(\Savannabits\SignaturePad\Forms\Components\Fields\SignaturePad::make('signature')
        ->backgroundColor('rgba(255,280,200,0)')
        ->getBackgroundColor())->toBe('rgba(255,280,200,0)');
});
