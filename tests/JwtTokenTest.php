<?php
/**
 * Created by PhpStorm.
 * User: josephmurphy
 * Date: 2/20/20
 * Time: 11:41 PM
 */

namespace jmurphy\PushNotifications\Tests;

use jmurphy\PushNotifications\Http\JWT\Exceptions\TokenInvalidException;
use jmurphy\PushNotifications\HTTP\JWT\Token\Token;
use Orchestra\Testbench\TestCase;

class JwtTokenTest extends TestCase
{
    /**
    *token return valid token
    *@test
    */
    public function a_token_return_valid_token()
    {
        $token = 'XXXX.XXXX.XXXX';

          $this->assertEquals($token, new Token($token));
    }

    /**
    *invalid token throws invalid token
    *@test
    */
    public function a_invalid_token_throws_invalid_token()
    {
        $this->expectException(TokenInvalidException::class);
        $token = 'XXXX.XXXX';
        new Token($token);
    }
}
