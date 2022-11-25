<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Item;

class Version215 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '2.1.5';

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
                if (empty($inventory_item)) {
                    continue;
                }

                $history = $inventory_item->history;

                if (!empty($history)) {
                    $history->delete();
                }
                
                $inventory_item->delete();
            }
        }
    }
}
