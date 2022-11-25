<?php

namespace Modules\SalesPurchaseOrders\Listeners\Menu;

use App\Events\Menu\AdminCreated as Event;
use App\Traits\Modules;

class Admin
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param Event $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        if (false === $this->moduleIsEnabled('sales-purchase-orders')) {
            return;
        }

        $user = auth()->user();

        if ($user->can(['read-sales-purchase-orders-sales-orders'])) {
            $salesMenu = $event->menu->findBy('title', trim(trans_choice('general.sales', 2)));


            $salesMenu->child(
                [
                    'route' => ['sales-purchase-orders.sales-orders.index', []],
                    'title' => trans_choice('sales-purchase-orders::general.sales_orders', 2),
                    'order' => 8,
                ]
            );
        }

        if ($user->can(['read-sales-purchase-orders-purchase-orders'])) {
            $purchasesMenu = $event->menu->findBy('title', trim(trans_choice('general.purchases', 2)));


            $purchasesMenu->child(
                [
                    'route' => ['sales-purchase-orders.purchase-orders.index', []],
                    'title' => trans_choice('sales-purchase-orders::general.purchase_orders', 2),
                    'order' => 5,
                ]
            );
        }
    }
}
