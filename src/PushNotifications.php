<?php

namespace jmurphy\PushNotifications;

class PushNotifications
{
    public $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function apple(string $name)
    {
    }

    public function andriod(string $name)
    {
    }
}
