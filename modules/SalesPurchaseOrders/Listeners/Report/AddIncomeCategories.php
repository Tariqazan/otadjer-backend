<?php

namespace Modules\SalesPurchaseOrders\Listeners\Report;

use App\Listeners\Report\AddIncomeCategories as Listener;
use Modules\SalesPurchaseOrders\Reports\SalesOrderSummary;

class AddIncomeCategories extends Listener
{
    protected $classes = [
        SalesOrderSummary::class,
    ];
}
