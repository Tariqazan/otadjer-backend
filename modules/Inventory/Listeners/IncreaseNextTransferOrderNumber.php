<?php

namespace Modules\Inventory\Listeners;

use Modules\Inventory\Events\TransferOrderCreated as Event;
use Modules\Inventory\Traits\Inventory;

class IncreaseNextTransferOrderNumber
{
    use Inventory;

    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        // Update next transfer order number
        $this->increaseNextTransferOrderNumber();
    }
}
