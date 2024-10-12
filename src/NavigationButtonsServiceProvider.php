<?php

namespace Hayder\NavigationButtons;

use Illuminate\Support\ServiceProvider;

class NavigationButtonsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__ . '/../config/navigation-buttons.php' => config_path('navigation-buttons.php'),
        ], 'navigation-buttons-config');

        // Load translations
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'navigation-buttons');

        // Publish translations
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/navigation-buttons'),
        ], 'navigation-buttons-translations');
    }

    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/navigation-buttons.php',
            'navigation-buttons'
        );
    }
}
