<?php

namespace Modules\SalesPurchaseOrders\Listeners;

use App\Events\Module\SettingShowing as Event;

class ShowInSettingsPage
{
    /**
     * Handle the event.
     *
     * @param Event $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        $event->modules->settings['sales-purchase-orders-sales-orders'] = [
            'name'        => trans_choice('sales-purchase-orders::general.sales_orders', 1),
            'description' => trans('sales-purchase-orders::sales_orders.description'),
            'url'         => route('sales-purchase-orders.settings.sales-order.edit'),
            'permission'  => 'read-sales-purchase-orders-settings-sales-order',
            'icon'        => 'fas fa-file-invoice-dollar',
        ];

        $event->modules->settings['sales-purchase-orders-purchase-orders'] = [
            'name'        => trans_choice('sales-purchase-orders::general.purchase_orders', 1),
            'description' => trans('sales-purchase-orders::purchase_orders.description'),
            'url'         => route('sales-purchase-orders.settings.purchase-order.edit'),
            'permission'  => 'read-sales-purchase-orders-settings-purchase-order',
            'icon'        => 'fas fa-file-invoice',
        ];
    }
}
