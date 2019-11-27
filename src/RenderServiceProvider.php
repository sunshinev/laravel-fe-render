<?php

namespace Sunshinev\Render;

use Illuminate\Support\ServiceProvider;

class RenderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 扩展视图
        $this->loadViewsFrom(__DIR__.'/views/layouts', 'fe-render');

        $this->publishes([
            __DIR__.'/config.php' => config_path('fe-render.php'),
        ],'laravel-gii');

        $this->publishes([
            __DIR__.'/assets' => public_path('/gii_assets/base_fe/'),
        ], 'laravel-gii');
    }
}
