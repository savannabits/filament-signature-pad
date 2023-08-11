# Signature Pad for FilamentPHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/coolsam/signature-pad.svg?style=flat-square)](https://packagist.org/packages/coolsam/signature-pad)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/savannabits/filament-signature-pad/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/savannabits/filament-signature-pad/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/savannabits/filament-signature-pad/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/coolsam/signature-pad/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/coolsam/signature-pad.svg?style=flat-square)](https://packagist.org/packages/coolsam/signature-pad)

A Signature pad field for FilamentPHP based on [szimek/signature_pad](https://github.com/szimek/signature_pad).

__NOTE: This documentation is for `^v2.0` which only supports FilamentPHP `^3.0`. If you are using `Filament 2.x`, you should use `SignaturePad v1.x`. [See the docs here](https://github.com/savannabits/filament-signature-pad/tree/1.x#readme)__

## Installation

You can install the package via composer:

```bash
composer require coolsam/signature-pad
```

Next, Publish filament's assets to ensure the plugin's assets are published to the public directory.
```bash
php artisan filament:assets
```

You may also publish the package's translations using:

```bash
php artisan vendor:publish --tag="signature-pad-translations"
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="signature-pad-config"
```

## Usage
Use it in your Filament Forms as follows:

```php
use Coolsam\SignaturePad\Forms\Components\Fields\SignaturePad;

SignaturePad::make('my_signature'),

// Other methods
SignaturePad::make('signature')
    ->backgroundColor('white') // Set the background color in case you want to download to jpeg
    ->penColor('blue') // Set the pen color
    ->strokeMinDistance(2.0) // set the minimum stroke distance (the default works fine)
    ->strokeMaxWidth(2.5) // set the max width of the pen stroke
    ->strokeMinWidth(1.0) // set the minimum width of the pen stroke
    ->strokeDotSize(2.0) // set the stroke dot size.
    ->hideDownloadButtons() // In case you don't want to show the download buttons on the pad, you can hide them by setting this option.
```
That's it! Enjoy composing beautiful signatures.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Sam Maosa](https://github.com/coolsam726)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
