<?php

namespace APP\Listner;

use APP\Events\OrderPlaced;

class SendOrderConfirmation
{
    public function handle(OrderPlaced $event)
    {
        $order = $event->order;


        echo "welcome listner order:$order";
    }
}
