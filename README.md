
# Add custom links to your nova navigation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vmitchell85/nova-links.svg?style=flat-square)](https://packagist.org/packages/vmitchell85/nova-links)
[![Total Downloads](https://img.shields.io/packagist/dt/vmitchell85/nova-links.svg?style=flat-square)](https://packagist.org/packages/vmitchell85/nova-links)


This tool allows you to add a links section in your sidebar.

![alt text](./screenshot.png "Nova Links Screenshot")

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require vmitchell85/nova-links
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \vmitchell85\NovaLinks\Links(),
    ];
}
```

To publish the config file to config/nova-links.php run:

php artisan vendor:publish --provider="vmitchell85\NovaLinks\NovaLinksServiceProvider" --tag="config"

To add links to the navigation section you need to add entries to the `links` section in the config in the format `'link-name' => 'url'`
