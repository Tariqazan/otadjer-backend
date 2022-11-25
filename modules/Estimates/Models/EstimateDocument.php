<?php

namespace Modules\Estimates\Models;

use App\Abstracts\Model;

class EstimateDocument extends Model
{
    protected $table = 'estimates_documents';

    protected $fillable = ['company_id', 'document_id', 'item_id', 'item_type'];

    /**
     * Get the owning item model.
     */
    public function item()
    {
        return $this->morphTo();
    }
}
