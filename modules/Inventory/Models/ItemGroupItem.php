<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;

class ItemGroupItem extends Model
{
    use Cloneable;

    protected $table = 'inventory_item_group_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'item_id', 'item_group_id', 'created_from', 'created_by'];

    public function taxes()
    {
        return $this->hasMany('App\Models\Common\ItemTax', 'item_id', 'item_id');
    }

    public function variants()
    {
        return $this->hasMany('Modules\Inventory\Models\ItemGroupVariant', 'item_group_id', 'item_group_id');
    }

    public function values()
    {
        return $this->hasMany('Modules\Inventory\Models\ItemGroupVariantValue');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item');
    }

    public function inventory_item()
    {
        return $this->hasOne('Modules\Inventory\Models\Item', 'item_id', 'item_id');
    }

    /**
     * Get the item id.
     *
     * @return string
     */
    public function getTaxIdsAttribute()
    {
        return $this->taxes()->pluck('tax_id');
    }
}
