<?php

namespace MediaMailer;

use Illuminate\Support\ServiceProvider;

class MediaMailerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish a config file
        $configPath = __DIR__.'/../config/mediatechlimited-mailer-client.php';
        $this->publishes([
            $configPath => config_path('mediatechlimited-mailer-client.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__.'/../config/mediatechlimited-mailer-client.php';
        $this->mergeConfigFrom($configPath, 'mediatechlimited-mailer-client');
    }
}
