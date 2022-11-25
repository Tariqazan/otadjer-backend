<?php

namespace Modules\SalesPurchaseOrders\Models\SalesOrder;

use App\Models\Document\DocumentItemTax;
use Illuminate\Database\Eloquent\Builder;

class ItemTax extends DocumentItemTax
{
    public function scopeSales(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
