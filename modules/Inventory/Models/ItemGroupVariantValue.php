<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;

class ItemGroupVariantValue extends Model
{
    use Cloneable;

    protected $table = 'inventory_item_group_variant_values';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'variant_id', 'variant_value_id', 'item_id', 'item_group_id', 'item_group_item_id', 'created_from', 'created_by'];

    public function item()
    {
        return $this->belongsTo('Modules\Inventory\Models\ItemGroupItem');
    }
}
