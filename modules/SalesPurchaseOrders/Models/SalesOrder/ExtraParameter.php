<?php

namespace Modules\SalesPurchaseOrders\Models\SalesOrder;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class ExtraParameter extends Model
{
    public $table = 'sales_purchase_orders_sales_extra_parameters';

    protected $dates = ['expected_shipment_date'];

    protected $fillable = ['company_id', 'document_id', 'expected_shipment_date'];

    public function sales_order(): BelongsTo
    {
        return $this->belongsTo(SalesOrder::class);
    }
}
