<?php

namespace Modules\SalesPurchaseOrders\Listeners\Report;

use App\Listeners\Report\AddExpenseCategories as Listener;
use Modules\SalesPurchaseOrders\Reports\PurchaseOrderSummary;

class AddExpenseCategories extends Listener
{
    protected $classes = [
        PurchaseOrderSummary::class,
    ];
}
