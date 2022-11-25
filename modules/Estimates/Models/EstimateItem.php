<?php

namespace Modules\Estimates\Models;

use App\Models\Document\DocumentItem;
use Illuminate\Database\Eloquent\Builder;

class EstimateItem extends DocumentItem
{
    public function scopeEstimate(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', Estimate::TYPE);
    }
}
