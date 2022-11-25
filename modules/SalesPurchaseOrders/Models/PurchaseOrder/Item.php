<?php

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder;

use App\Models\Document\DocumentItem;
use Illuminate\Database\Eloquent\Builder;

class Item extends DocumentItem
{
    public function scopePurchase(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
