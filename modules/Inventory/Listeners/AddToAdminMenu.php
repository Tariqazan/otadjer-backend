<?php

namespace Modules\Inventory\Listeners;

use App\Events\Menu\AdminCreated as Event;
use App\Traits\Modules;
use Modules\Inventory\Events\AdminMenu;

class AddToAdminMenu
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
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $user = user();

        if (!user()->can([
            'read-inventory-item-groups',
            'read-common-items',
            'read-inventory-variants',
            'read-inventory-manufacturers',
            'read-inventory-transfer-orders',
            'read-inventory-adjustments',
            'read-inventory-warehouses',
        ])) {
            return;
        }

        $attr = [];

        $event->menu->removeByTitle(trim(trans_choice('general.items', 2)));

        $event->menu->dropdown(trans('inventory::general.menu.inventory'), function ($sub) use ($user, $attr) {
            if ($user->can('read-common-items')) {
                $sub->route('inventory.items.index', trans_choice('general.items', 2), [], 10, $attr);
            }

            if ($user->can('read-inventory-item-groups')) {
                $sub->route('inventory.item-groups.index', trans_choice('inventory::general.item_groups', 2), [], 20, $attr);
            }

            if ($user->can('read-inventory-variants')) {
                $sub->route('inventory.variants.index', trans_choice('inventory::general.variants', 2), [], 30, $attr);
            }

            // if ($user->can('read-inventory-manufacturers')) {
            //     $sub->route('inventory.manufacturers.index', trans('inventory::general.menu.manufacturers'), [], 40, $attr);
            // }

            if ($user->can('read-inventory-transfer-orders')) {
                $sub->route('inventory.transfer-orders.index', trans_choice('inventory::general.transfer_orders', 2), [], 50, $attr);
            }

            if ($user->can('read-inventory-adjustments')) {
                $sub->route('inventory.adjustments.index', trans_choice('inventory::general.adjustments', 2), [], 50, $attr);
            }

            if ($user->can('read-inventory-warehouses')) {
                $sub->route('inventory.warehouses.index', trans_choice('inventory::general.warehouses', 2), [], 60, $attr);
            }

            if ($user->can('read-inventory-histories')) {
                $sub->route('inventory.histories.index', trans_choice('inventory::general.histories', 2), [], 70, $attr);
            }
        }, 22, [
            'title' => trans('inventory::general.title'),
            'icon' => 'fa fa-cubes',
        ]);

        event(new AdminMenu($event->menu));
    }
}
