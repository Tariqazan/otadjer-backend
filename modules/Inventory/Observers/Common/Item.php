<?php

namespace Modules\Inventory\Observers\Common;

use App\Models\Common\Item as Model;
use App\Traits\Jobs;
use App\Traits\Modules;
use Modules\Inventory\Jobs\Items\CreateItem;
use Modules\Inventory\Jobs\Items\DeleteItem;
use Modules\Inventory\Jobs\Items\UpdateItem;

class Item
{
    use Jobs, Modules;

    /**
     * Listen to the created event.
     *
     * @param  Model $item
     *
     * @return void
     */
    public function created(Model $item)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $request = request();

        if ($request->has('track_inventory')) {
            if (empty($request->get('track_inventory'))) {
                return;
            }
        } else {
            if (setting('inventory.track_inventory') == false) {
                return;
            }
        }

        $this->dispatch(new CreateItem($request, $item));
    }

    public function saved(Model $item)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $method = request()->getMethod();

        if ($method == 'PATCH') {
            $this->updated($item);
        }
    }

    /**
     * Listen to the created event.
     *
     * @param  Model $item
     *
     * @return void
     */
    public function updated(Model $item)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $request = request();

        if ($request->has('track_inventory')) {
            if (empty($request->get('track_inventory'))) {
                return;
            }
        } else {
            if (setting('inventory.track_inventory') == false) {
                return;
            }
        }

        $inventory_item = $item->inventory()->get();

        if (!empty($inventory_item)) {
            $this->dispatch(new UpdateItem($request, $item));
        } else {
            $this->dispatch(new CreateItem($request, $item));
        }
    }

    /**
     * Listen to the deleted event.
     *
     * @param  Model $item
     *
     * @return void
     */
    public function deleted(Model $item)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $inventory_item = $item->inventory()->first();

        if (empty($inventory_item)) {
            return;
        }

        $this->dispatch(new DeleteItem($inventory_item));
    }
}
