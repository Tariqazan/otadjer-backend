<?php

namespace Modules\Inventory\Events;

use Illuminate\Queue\SerializesModels;

class TransferOrderCreated
{
    use SerializesModels;

    public $transfer_order;

    /**
     * Create a new event instance.
     *
     * @param $transfer_order
     */
    public function __construct($transfer_order)
    {
        $this->transfer_order = $transfer_order;
    }
}
