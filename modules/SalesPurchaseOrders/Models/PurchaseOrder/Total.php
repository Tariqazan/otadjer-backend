<?php

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder;

use App\Models\Document\DocumentTotal;
use Illuminate\Database\Eloquent\Builder;

class Total extends DocumentTotal
{
    public function scopePurchase(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
