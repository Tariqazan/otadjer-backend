<?php

namespace Modules\SalesPurchaseOrders\Models\SalesOrder;

use App\Models\Document\DocumentTotal;
use Illuminate\Database\Eloquent\Builder;

class Total extends DocumentTotal
{
    public function scopeSales(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
