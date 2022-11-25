<?php

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder;

use App\Abstracts\Model;

class Bill extends Model
{
    protected $table = 'purchase_order_bill';

    protected $fillable = ['purchase_order_id', 'bill_id'];
}
