<?php

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder;

use App\Models\Document\DocumentHistory;
use Illuminate\Database\Eloquent\Builder;

class History extends DocumentHistory
{
    public function scopePurchase(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Model::TYPE);
    }
}
