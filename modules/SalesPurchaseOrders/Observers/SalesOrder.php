<?php

namespace Modules\SalesPurchaseOrders\Observers;

use App\Abstracts\Observer;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model;

class SalesOrder extends Observer
{
    public function deleted(Model $salesOrder): void
    {
        $salesOrder->extra_param()->delete();
    }
}
