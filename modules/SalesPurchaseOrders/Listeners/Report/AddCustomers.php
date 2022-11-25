<?php

namespace Modules\SalesPurchaseOrders\Listeners\Report;

use App\Listeners\Report\AddCustomers as Listener;
use Modules\SalesPurchaseOrders\Reports\SalesOrderSummary;

class AddCustomers extends Listener
{
    protected $classes = [
        SalesOrderSummary::class,
    ];
}
