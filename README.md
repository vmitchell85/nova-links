# A Laravel Nova package to display custom links in the sidebar navigation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vmitchell85/nova-links.svg?style=flat-square)](https://packagist.org/packages/vmitchell85/nova-links)
[![Total Downloads](https://img.shields.io/packagist/dt/vmitchell85/nova-links.svg?style=flat-square)](https://packagist.org/packages/vmitchell85/nova-links)

!['Header Image'](https://banners.beyondco.de/Nova%20Links.png?theme=dark&packageManager=composer+require&packageName=vmitchell85%2Fnova-links&pattern=hexagons&style=style_2&description=Add+custom+links+to+your+Nova+sidebar&md=1&showWatermark=0&fontSize=100px&images=link)

This package leets you add any number of links to the Nova sidebar.

> **Note:** For Nova 3 or earlier use version 1.x

## Installation

You can install the package via composer:

```bash
composer require vmitchell85/nova-links
```

## Usage

Register the tool in the `tools` method of the `NovaServiceProvider`.

```php
// app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        (new \vmitchell85\NovaLinks\Links('Documentation'))
            ->addExternalLink('Laravel Docs', 'https://laravel.com/docs')
            ->addExternalLink('Nova Docs', 'https://nova.laravel.com/docs')
    ];
}
```

### Examples

Add internal links or external links calling the `addLink` or `addExternalLink` methods respectively.

```php
// app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        (new \vmitchell85\NovaLinks\Links('All Links'))
            ->addLink('Nova Main', '/')
            ->addExternalLink('Laravel Docs', 'https://laravel.com/docs'),
    ];
}
```

You can also change the navigation label by passing a string to the constructor:

```php
// app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        (new \vmitchell85\NovaLinks\Links('Quick Links'))
            ->addLink('Nova Main', '/')
            ->addExternalLink('Frontend', url('/')),

        (new \vmitchell85\NovaLinks\Links('Laravel-related News'))
            ->addExternalLink('Laravel Blog', 'https://blog.laravel.com')
            ->addExternalLink('Laravel News', 'https://laravel-news.com'),
    ];
}
```

To open a link in a new browser window, set the third parameter on `addLink` or `addExternalLink` to `true`:

```php
// app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        (new \vmitchell85\NovaLinks\Links('Laravel-related News'))
            ->addLink('Nova Main', '/', true)
            ->addExternalLink('Laravel News', 'https://laravel-news.com', true),
    ];
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
