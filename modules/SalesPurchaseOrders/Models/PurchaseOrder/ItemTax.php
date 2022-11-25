<?php

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder;

use App\Models\Document\DocumentItemTax;
use Illuminate\Database\Eloquent\Builder;

class ItemTax extends DocumentItemTax
{
    public function scopePurchase(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
