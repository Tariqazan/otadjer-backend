<?php

namespace Modules\SalesPurchaseOrders\Providers;

use Illuminate\Support\ServiceProvider as Provider;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Observers\SalesOrder as SalesOrderObserver;
use Modules\SalesPurchaseOrders\Observers\PurchaseOrder as PurchaseOrderObserver;

class Observer extends Provider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        SalesOrder::observe(SalesOrderObserver::class);
        PurchaseOrder::observe(PurchaseOrderObserver::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
