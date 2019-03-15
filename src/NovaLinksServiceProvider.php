<?php

namespace vmitchell85\NovaLinks;

use Illuminate\Support\ServiceProvider;

class NovaLinksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-links');

        $this->publishes([
            __DIR__ . '/../config/nova-links.php' => config_path('nova-links.php')
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/nova-links.php',
            'nova-links'
        );
    }
}
