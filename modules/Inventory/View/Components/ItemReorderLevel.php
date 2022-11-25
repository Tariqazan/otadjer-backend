<?php

namespace Modules\Inventory\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Modules\Inventory\Models\Item as InventoryItem;

class ItemReorderLevel extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $limit = 5;

        $notifications = $this->getNotifications($limit);

        return view('inventory::components.item-reorder-level', compact('notifications'));
    }

    protected function getNotifications($limit = false)
    {
        $query = user()->unreadNotifications()
            ->where('type', 'Modules\Inventory\Notifications\ItemReorderLevel');

        if ($limit) {
            $notifications = $query->paginate($limit);
        } else {
            $notifications = $query->get();
        }

        if ($notifications->items()) {
            $items = [];

            foreach ($notifications->items() as $key => $notification) {
                $data = (object) $notification->getAttribute('data');

                $item = InventoryItem::where('id', $data->inventory_item_id)->first();

                if ($item) {
                    $item->notification_id = $notification->getAttribute('id');

                    $items[] = $item;
                };
            }

            $notifications->setCollection(Collection::make($items));
        }

        return $notifications;
    }
}
