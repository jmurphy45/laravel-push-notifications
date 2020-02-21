<?php
/**
 * Created by PhpStorm.
 * User: josephmurphy
 * Date: 2/20/20
 * Time: 9:01 PM
 */

namespace jmurphy\PushNotifications\Contracts;


interface Notification
{

    public function payload(): array;
}