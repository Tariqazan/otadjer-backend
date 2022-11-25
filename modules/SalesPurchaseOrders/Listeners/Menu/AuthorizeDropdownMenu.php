<?php

namespace Modules\SalesPurchaseOrders\Listeners\Menu;

use App\Events\Menu\ItemAuthorizing as Event;
use App\Traits\Modules;

class AuthorizeDropdownMenu
{
    use Modules;

    public function handle(Event $event)
    {
        if (false === $this->moduleIsEnabled('sales-purchase-orders')) {
            return;
        }

        // Sales -> Sales Orders
        $sales = trim(trans_choice('general.sales', 2));
        if ($event->item->title === $sales && $event->item->title === trim(trans_choice('general.sales', 2))) {
            $event->item->permissions[] = 'read-sales-purchase-orders-sales-orders';
        }

        // Sales -> Purchase Orders
        $purchases = trim(trans_choice('general.purchases', 2));
        if ($event->item->title === $purchases
            && $event->item->title === trim(trans_choice('general.purchases', 2))) {
            $event->item->permissions[] = 'read-sales-purchase-orders-purchase-orders';
        }
    }
}
