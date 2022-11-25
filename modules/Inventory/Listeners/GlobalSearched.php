<?php

namespace Modules\Inventory\Listeners;

use App\Models\Common\Item;
use Modules\Inventory\Models\Variant;
use Modules\Inventory\Models\History;
use Modules\Inventory\Models\ItemGroup;
use Modules\Inventory\Models\Warehouse;
use Modules\Inventory\Models\TransferOrder;
use App\Events\Common\GlobalSearched as Event;

class GlobalSearched
{
    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        $this->user = user();
        $this->keyword = $event->search->keyword;
        $this->results = $event->search->results;

        $this->searchOnItems($event);
        $this->searchOnItemGroups($event);
        $this->searchOnVariants($event);
        $this->searchOnTransferOrders($event);
        $this->searchOnWarehouses($event);

        return view('livewire.common.search');
    }


    /**
     * Searching on Banking InventoryItems with given keyword.
     *
     * @return void
     */
    public function searchOnItems($event)
    {
        if (!$this->user->can('read-inventory-items')) {
            return;
        }

        $items = Item::enabled()
            ->usingSearchString($this->keyword)
            ->take(setting('default.select_limit'))
            ->get();

        if ($items->isEmpty()) {
            return;
        }

        foreach ($items as $item) {
            $event->search->results[] = (object) [
                'id' => $item->id,
                'name' => $item->name,
                'type' => 'Inventory '. trans_choice('general.items', 1),
                'color' => '#55588b',
                'href' => route('inventory.items.edit', $item->id),
            ];
        }
    }

    /**
     * Searching on Banking ItemGroups with given keyword.
     *
     * @return void
     */
    public function searchOnItemGroups($event)
    {
        if (!$this->user->can('read-inventory-item-groups')) {
            return;
        }

        $itemgroups = ItemGroup::enabled()
            ->usingSearchString($this->keyword)
            ->take(setting('default.select_limit'))
            ->get();

        if ($itemgroups->isEmpty()) {
            return;
        }

        foreach ($itemgroups as $itemgroup) {
            $event->search->results[] = (object) [
                'id' => $itemgroup->id,
                'name' => $itemgroup->name,
                'type' => 'Inventory '. trans_choice('inventory::general.item_groups', 1),
                'color' => '#55588b',
                'href' => route('inventory.item-groups.edit', $itemgroup->id),
            ];
        }
    }

    /**
     * Searching on Banking Variants with given keyword.
     *
     * @return void
     */
    public function searchOnVariants($event)
    {
        if (!$this->user->can('read-inventory-variants')) {
            return;
        }

        $variants = Variant::enabled()
            ->usingSearchString($this->keyword)
            ->take(setting('default.select_limit'))
            ->get();

        if ($variants->isEmpty()) {
            return;
        }

        foreach ($variants as $variant) {
            $event->search->results[] = (object) [
                'id' => $variant->id,
                'name' => $variant->name,
                'type' => 'Inventory '. trans_choice('inventory::general.variants', 1),
                'color' => '#55588b',
                'href' => route('inventory.variants.edit', $variant->id),
            ];
        }
    }

    /**
     * Searching on Banking TransferOrders with given keyword.
     *
     * @return void
     */
    public function searchOnTransferOrders($event)
    {
        if (!$this->user->can('read-inventory-transfer-orders')) {
            return;
        }

        $transfer_orders = TransferOrder::usingSearchString($this->keyword)
            ->take(setting('default.select_limit'))
            ->get();

        if ($transfer_orders->isEmpty()) {
            return;
        }

        foreach ($transfer_orders as $transfer_order) {
            $event->search->results[] = (object) [
                'id' => $transfer_order->id,
                'name' => $transfer_order->transfer_order,
                'type' => 'Inventory '. trans_choice('inventory::general.transfer_orders', 1),
                'color' => '#55588b',
                'href' => route('inventory.transfer-orders.edit', $transfer_order->id),
            ];
        }
    }

    /**
     * Searching on Banking Warehouses with given keyword.
     *
     * @return void
     */
    public function searchOnWarehouses($event)
    {
        if (!$this->user->can('read-inventory-warehouses')) {
            return;
        }

        $warehouses = Warehouse::usingSearchString($this->keyword)
            ->take(setting('default.select_limit'))
            ->get();

        if ($warehouses->isEmpty()) {
            return;
        }

        foreach ($warehouses as $warehouse) {
            $event->search->results[] = (object) [
                'id' => $warehouse->id,
                'name' => $warehouse->name,
                'type' => 'Inventory '. trans_choice('inventory::general.warehouses', 1),
                'color' => '#55588b',
                'href' => route('inventory.warehouses.edit', $warehouse->id),
            ];
        }
    }
}
