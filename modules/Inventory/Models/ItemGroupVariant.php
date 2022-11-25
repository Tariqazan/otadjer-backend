<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;

class ItemGroupVariant extends Model
{
    use Cloneable;

    protected $table = 'inventory_item_group_variants';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'item_group_id', 'variant_id', 'created_from', 'created_by'];

    public function values()
    {
        return $this->hasMany('Modules\Inventory\Models\ItemGroupVariantValue', 'item_group_id', 'item_group_id');
    }

    public function variant_values()
    {
        return $this->hasMany('Modules\Inventory\Models\VariantValue', 'variant_id', 'variant_id');
    }

    public function variant()
    {
        return $this->belongsTo('Modules\Inventory\Models\Variant');
    }
}
