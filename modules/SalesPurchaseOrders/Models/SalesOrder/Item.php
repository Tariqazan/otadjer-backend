<?php

namespace Modules\SalesPurchaseOrders\Models\SalesOrder;

use App\Models\Document\DocumentItem;
use Illuminate\Database\Eloquent\Builder;

class Item extends DocumentItem
{
    public function scopeSales(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
