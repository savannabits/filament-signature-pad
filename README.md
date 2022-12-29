# Signature Pad Field for Filamentphp Forms

[![Latest Version on Packagist](https://img.shields.io/packagist/v/savannabits/filament-signature-pad.svg?style=flat-square)](https://packagist.org/packages/savannabits/filament-signature-pad)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/savannabits/filament-signature-pad/run-tests?label=tests)](https://github.com/savannabits/filament-signature-pad/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/savannabits/filament-signature-pad/Check%20&%20fix%20styling?label=code%20style)](https://github.com/savannabits/filament-signature-pad/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/savannabits/filament-signature-pad.svg?style=flat-square)](https://packagist.org/packages/savannabits/filament-signature-pad)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require savannabits/filament-signature-pad
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-signature-pad-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-signature-pad-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-signature-pad-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filament-signature-pad = new Savannabits\SignaturePad();
echo $filament-signature-pad->echoPhrase('Hello, Savannabits!');
```

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

- [Sam Maosa](https://github.com/savannabits)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
