<?php
namespace jmurphy\PushNotifications\Http\JWT\Exceptions;

use Exception;

class JWTException extends Exception
{
    /**
     * {@inheritdoc}
     */
    protected $message = 'An error occurred';
}