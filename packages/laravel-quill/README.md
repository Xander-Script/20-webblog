# Integrates Quill with Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/xanderificnl/laravel-quill.svg?style=flat-square)](https://packagist.org/packages/xanderificnl/laravel-quill)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/xanderificnl/laravel-quill/run-tests?label=tests)](https://github.com/xanderificnl/laravel-quill/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/xanderificnl/laravel-quill/Check%20&%20fix%20styling?label=code%20style)](https://github.com/xanderificnl/laravel-quill/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/xanderificnl/laravel-quill.svg?style=flat-square)](https://packagist.org/packages/xanderificnl/laravel-quill)

Simple integration of Quill w/ Laravel.

## Installation

You can install the package via composer:

```bash
composer require xanderificnl/laravel-quill
```

Install Quill into your project via NPM, or a CDN, and include a stylesheet and Quall's javascript.

Set up your config:

```bash
php artisan vendor:publish --tag="laravel-quill-config"
```

Optionally, you can publish the view components using

```bash
php artisan vendor:publish --tag="laravel-quill-components"
```

## Usage

```blade
<x-laravel-quill-editor-component :id="$id" :options="$options">
    <h1>Your content</h1>
</x-laravel-quill-editor-component>
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

- [Xanderificnl](https://github.com/xanderificnl)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
