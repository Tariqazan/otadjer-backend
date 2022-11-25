<?php

namespace Modules\SalesPurchaseOrders\Listeners\Report;

use App\Listeners\Report\AddVendors as Listener;
use Modules\SalesPurchaseOrders\Reports\PurchaseOrderSummary;

class AddVendors extends Listener
{
    protected $classes = [
        PurchaseOrderSummary::class,
    ];
}
