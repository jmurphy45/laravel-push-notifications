<?php
/**
 * Created by PhpStorm.
 * User: josephmurphy
 * Date: 2/20/20
 * Time: 11:18 PM
 */

namespace jmurphy\PushNotifications\HTTP\JWT\Token;

use jmurphy\PushNotifications\Http\JWT\Exceptions\TokenInvalidException;

class TokenValidator
{
    /**
     * Check the structure of the token.
     *
     * @param  string  $value
     *
     * @return string
     */
    public function check($value)
    {
        return $this->validateStructure($value);
    }

    /**
     * @param  string  $token
     *
     * @throws \Tymon\JWTAuth\Exceptions\TokenInvalidException
     *
     * @return string
     */
    protected function validateStructure($token)
    {
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            throw new TokenInvalidException('Wrong number of segments');
        }

        $parts = array_filter(array_map('trim', $parts));

        if (count($parts) !== 3 || implode('.', $parts) !== $token) {
            throw new TokenInvalidException('Malformed token');
        }

        return $token;
    }
}