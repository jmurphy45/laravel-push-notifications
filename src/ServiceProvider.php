<?php

namespace jmurphy\PushNotifications;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/push-notifications.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('push-notifications.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'push-notifications'
        );

        $this->app->bind('push-notifications', function () {
            return new PushNotifications();
        });
    }
}
