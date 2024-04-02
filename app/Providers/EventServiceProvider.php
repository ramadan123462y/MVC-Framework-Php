<?php


namespace APP\Providers;

use APP\Events\OrderPlaced;
use APP\Listner\SendOrderConfirmation;

class EventServiceProvider
{

    public static $listen = [
        OrderPlaced::class => [
            SendOrderConfirmation::class,
            SendOrderConfirmation::class,
        ],

    ];
}
