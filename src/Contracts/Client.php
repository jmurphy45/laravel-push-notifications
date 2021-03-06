<?php

namespace jmurphy\PushNotifications\Contracts;

/**
 * PUsh Notification API wrapper for Laravel.
 *
 * @author   @jmurphy
 */
interface Client
{
    /**
     * @param $endPoint
     * @param array $params
     * @return mixed
     */
    public function post($endPoint, array $params = []);
}
