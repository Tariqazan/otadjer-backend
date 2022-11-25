<?php

namespace Modules\CompositeItems\Listeners;

use Auth;
use App\Traits\Modules;
use Modules\Inventory\Events\AdminMenu as Event;

class AddToInventoryAdminMenu
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
        if (!$this->moduleIsEnabled('composite-items') && !$this->moduleIsEnabled('inventory')) {
            return;
        }

        $user = Auth::user();

        if (!$user->can(['read-composite-items-composite-items'])) {
            return;
        }

        $item = $event->menu->whereTitle(trim(trans('inventory::general.menu.inventory')));

        $item->url(route('composite-items.composite-items.index'), trans('composite-items::general.name'), 12, []);
    }
}
