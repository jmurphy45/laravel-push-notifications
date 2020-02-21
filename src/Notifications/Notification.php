<?php
/**
 * Created by PhpStorm.
 * User: josephmurphy
 * Date: 2/20/20
 * Time: 9:18 PM
 */

namespace jmurphy\PushNotifications\Notifications;

use jmurphy\PushNotifications\Contracts\Notification as PushNotification;

abstract class Notification implements PushNotification
{
    public function payload(): array
    {
        return [];
    }

}