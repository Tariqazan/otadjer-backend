<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;

class BillItem extends Model
{
    protected $table = 'inventory_bill_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'bill_id', 'item_id', 'warehouse_id', 'quantity'];
}
