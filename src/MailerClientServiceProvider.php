<?php

namespace MailerClient;

use Illuminate\Support\ServiceProvider;

class MailerClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Publish a config file
        $configPath = __DIR__.'/../config/mailer-client.php';
        $this->publishes([
            $configPath => config_path('mailer-client.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__.'/../config/mailer-client.php';
        $this->mergeConfigFrom($configPath, 'mailer-client');
    }
}
