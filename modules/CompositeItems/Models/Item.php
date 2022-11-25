<?php

namespace Modules\CompositeItems\Models;

use App\Abstracts\Model;

class Item extends Model
{
    protected $table = 'composite_items_items';

    protected $fillable = [
        'company_id',
        'item_id',
        'composite_item_id',
        'quantity',
        'warehouse_id',
        'created_from',
        'created_by',
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item');
    }
}
