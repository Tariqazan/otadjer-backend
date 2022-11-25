<?php

namespace Modules\Inventory\Http\ViewComposers;

use App\Traits\Modules;
use Illuminate\View\View;
use Modules\Inventory\Models\Item;

class ItemReorderLevel
{
    use Modules;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        if (user()->cannot('read-common-notifications')) {
            return;
        }

        $item_notifications = [];
        $unreads = user()->unreadNotifications;
        $notifications = $view->getData()['notifications'];

        foreach ($unreads as $unread) {
            $data = $unread->getAttribute('data');

            switch ($unread->getAttribute('type')) {
                case 'Modules\Inventory\Notifications\ItemReorderLevel':
                    $item_notifications[] = $data;
                    $notifications++;
                    break;
            }
        }

        $view->with('notifications', $notifications);

        if (!empty($item_notifications)) {
            $view->getFactory()->startPush('notification_invoices_end', view('inventory::partials.reorder_level', compact('item_notifications')));
        }
    }
}
