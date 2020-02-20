<?php

namespace jmurphy\PushNotifications\Tests;

use jmurphy\PushNotifications\Facades\PushNotifications;
use jmurphy\PushNotifications\ServiceProvider;
use Orchestra\Testbench\TestCase;

class PushNotificationsTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'push-notifications' => PushNotifications::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
