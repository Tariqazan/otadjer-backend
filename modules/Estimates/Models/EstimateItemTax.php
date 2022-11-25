<?php

namespace Modules\Estimates\Models;

use App\Models\Document\DocumentItemTax;
use Illuminate\Database\Eloquent\Builder;

class EstimateItemTax extends DocumentItemTax
{
    public function scopeEstimate(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Estimate::TYPE);
    }
}
