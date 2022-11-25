<?php

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;

class ExtraParameter extends Model
{
    public $table = 'sales_purchase_orders_purchase_extra_parameters';

    protected $dates = ['expected_delivery_date'];

    protected $fillable = ['company_id', 'document_id', 'expected_delivery_date'];

    public function purchase_order(): BelongsTo
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
}
