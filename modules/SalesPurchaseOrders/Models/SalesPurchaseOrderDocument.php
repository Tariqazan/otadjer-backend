<?php

namespace Modules\SalesPurchaseOrders\Models;

use App\Abstracts\Model;

class SalesPurchaseOrderDocument extends Model
{
    protected $table = 'sales_purchase_orders_documents';

    protected $fillable = ['company_id', 'document_id', 'item_id', 'item_type'];

    /**
     * Get the owning item model.
     */
    public function item()
    {
        return $this->morphTo();
    }
}
