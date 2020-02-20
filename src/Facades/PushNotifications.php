<?php

namespace jmurphy\PushNotifications\Facades;

use Illuminate\Support\Facades\Facade;

class PushNotifications extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'push-notifications';
    }
}
