<?php

namespace APP\Events;



class OrderPlaced
{

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
