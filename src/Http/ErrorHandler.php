<?php
/**
 * Created by PhpStorm.
 * User: josephmurphy
 * Date: 2/19/20
 * Time: 7:00 PM.
 */

namespace jmurphy\PushNotifications\Http;

use Illuminate\Http\Response;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ErrorHandler
{
    public function __invoke(callable $handler)
    {
        return function (RequestInterface $request, array $options) use ($handler) {
            return $handler($request, $options)->then(function ($response) {
                if ($this->isSuccessful($response)) {
                    return $response;
                }
                $this->handleErrorResponse($response);
            });
        };
    }

    public function isSuccessful(ResponseInterface $response)
    {
        return $response->getStatusCode() < Response::HTTP_BAD_REQUEST;
    }

    /**
     * @param ResponseInterface $response
     * @throws EventbriteErrorException
     * @throws Exception
     */
    public function handleErrorResponse(ResponseInterface $response)
    {
    }
}
