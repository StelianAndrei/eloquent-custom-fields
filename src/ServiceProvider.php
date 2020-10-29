<?php

namespace StelianAndrei\EloquentCustomFields;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/custom_fields.php' => config_path('custom_fields.php'),
            ],
            ['custom-fields', 'config']
        );

        $this->publishes(
            [
                __DIR__ . '/../migrations/' => database_path('migrations'),
            ],
            ['custom-fields', 'migrations']
        );
    }
}