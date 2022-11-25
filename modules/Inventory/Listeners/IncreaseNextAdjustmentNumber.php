<?php

namespace Modules\Inventory\Listeners;

use Modules\Inventory\Events\AdjustmentCreated as Event;
use Modules\Inventory\Traits\Inventory;

class IncreaseNextAdjustmentNumber
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
        // Update next adjustment number
        $this->increaseNextAdjustmentNumber();
    }
}
