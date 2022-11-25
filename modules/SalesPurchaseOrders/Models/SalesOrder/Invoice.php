<?php

namespace Modules\SalesPurchaseOrders\Models\SalesOrder;

use App\Abstracts\Model;

class Invoice extends Model
{
    protected $table = 'sales_order_bill';

    protected $fillable = ['sales_order_id', 'invoice_id'];
}
