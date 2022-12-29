<?php

namespace Savannabits\SignaturePad;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class SignaturePadServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-signature-pad';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-filament-signature-pad' => __DIR__.'/../resources/dist/filament-signature-pad.css',
    ];

    protected array $scripts = [
//        'plugin-filament-signature-pad' => __DIR__.'/../resources/dist/filament-signature-pad.js',
    ];

     protected array $beforeCoreScripts = [
         'plugin-filament-signature-pad' => __DIR__ . '/../resources/dist/filament-signature-pad.js',
     ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)->hasViews();
    }
}
