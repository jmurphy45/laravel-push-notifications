<?php

namespace jmurphy\PushNotifications;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use jmurphy\PushNotifications\Http\Client;
use Illuminate\Database\Eloquent\Collection as ModelCollection;

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

    //PushNotification::apple($users,Notification::class)
    public function apple($notifiables, $notification)
    {
        $notifiables = $this->formatNotifiables($notifiables);

        $original = clone $notification;

        foreach ($notifiables as $notifiable){
            $this->client->post('',[],['content_type' => 'json']);
        }
    }

    public function andriod($notifiables, $notification)
    {
    }

    /**
     * Format the notifiables into a Collection / array if necessary.
     *
     * @param  mixed  $notifiables
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    protected function formatNotifiables($notifiables)
    {
        if (! $notifiables instanceof Collection && ! is_array($notifiables)) {
            return $notifiables instanceof Model
                ? new ModelCollection([$notifiables]) : [$notifiables];
        }

        return $notifiables;
    }
}
