<?php

namespace Modules\Estimates\Models;

use App\Models\Document\DocumentHistory;
use Illuminate\Database\Eloquent\Builder;

class EstimateHistory extends DocumentHistory
{
    public function scopeEstimate(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Estimate::TYPE);
    }
}
