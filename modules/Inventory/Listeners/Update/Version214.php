<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Item;

class Version214 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '2.1.4';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->onlyTrashedItem();
    }

    public function onlyTrashedItem()
    {
        $items = Item::onlyTrashed()->get();

        foreach ($items as $item){
            $inventory_items = $item->inventory()->get();

            foreach ($inventory_items as $inventory_item) {
                $inventory_item->history->delete();
                $inventory_item->delete();
            }
        }
    }
}
