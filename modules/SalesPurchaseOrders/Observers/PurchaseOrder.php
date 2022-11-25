<?php

namespace Modules\SalesPurchaseOrders\Observers;

use App\Abstracts\Observer;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model;

class PurchaseOrder extends Observer
{
    public function deleted(Model $purchaseOrder): void
    {
        $purchaseOrder->extra_param()->delete();
    }
}
