<?php

namespace jmurphy\PushNotifications;

use Firebase\JWT\JWT;
use jmurphy\PushNotifications\Http\Client;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Key;
use Lcobucci\JWT\Signer\Ecdsa\Sha256;

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
            return new PushNotifications(new Client('', $this->getToken()));
        });
    }

    //https://stackoverflow.com/questions/56619355/es256-jwt-signing-in-php-for-apple-appstoreconenct-api-auth
    private function getToken()
    {
        $signer = new Sha256();
        $privateKey = new Key('file://AuthKey_XYZ.p8');
        $time = time();
        $token = (new Builder())->issuedBy('http://example.com')// Configures the issuer (iss claim)
        ->issuedAt($time)// Configures the time that the token was issue (iat claim)
        ->withHeader('kid', $Key_ID)
            ->withHeader('type', 'JWT')
            ->withHeader('alg', 'ES256')
            ->getToken($signer, $privateKey); // Retrieves the generated token
    }
}
