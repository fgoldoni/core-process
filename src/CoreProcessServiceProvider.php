<?php

namespace Goldoni\CoreProcess;

use Illuminate\Support\ServiceProvider;

class CoreProcessServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/core-process.php', 'core-process');

        $this->publishes([
            __DIR__.'/../config/core-process.php' => config_path('core-process.php')
        ], 'core-process-config');
    }

    public function boot(): void
    {
        //
    }
}
