<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;

class InvoiceItem extends Model
{
    protected $table = 'inventory_invoice_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'invoice_id',
        'item_id',
        'warehouse_id',
        'quantity',
        'created_from',
        'created_by'
    ];
}
