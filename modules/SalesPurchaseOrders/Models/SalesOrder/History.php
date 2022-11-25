<?php

namespace Modules\SalesPurchaseOrders\Models\SalesOrder;

use App\Models\Document\DocumentHistory;
use Illuminate\Database\Eloquent\Builder;

class History extends DocumentHistory
{
    public function scopeSales(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
