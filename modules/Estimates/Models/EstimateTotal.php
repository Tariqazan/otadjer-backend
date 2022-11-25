<?php

namespace Modules\Estimates\Models;

use App\Models\Document\DocumentTotal;
use Illuminate\Database\Eloquent\Builder;

class EstimateTotal extends DocumentTotal
{
    public function scopeEstimate(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Estimate::TYPE);
    }
}
