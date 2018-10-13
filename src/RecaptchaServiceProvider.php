<?php

namespace almod90\Recaptcha;

use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'Recaptcha');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__.'/../config' => config_path()]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('recaptcha', function() {
            return new Recaptcha();
        });
    }

    public function provides()
    {
        return ['recaptcha'];
    }
}