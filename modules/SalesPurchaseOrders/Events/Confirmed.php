<?php

namespace Modules\SalesPurchaseOrders\Events;

use App\Abstracts\Event;

class Confirmed extends Event
{
    public $document;

    /**
     * Create a new event instance.
     *
     * @param $document
     */
    public function __construct($document)
    {
        $this->document = $document;
    }
}
