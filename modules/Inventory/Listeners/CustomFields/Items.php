<?php

namespace Modules\Inventory\Listeners\CustomFields;

use App\Traits\Modules;
use Modules\CustomFields\Events\LocationCodeReplacing as Event;
class Items
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if (!$this->moduleIsEnabled('inventory') && !$this->moduleIsEnabled('custom-fields')) {
            return;
        }

        if ($event->code == 'inventory.items') {
            $event->code = 'common.items';

            return $event->code;
        }
    }
}
