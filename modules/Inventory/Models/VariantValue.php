<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;

class VariantValue extends Model
{
    use Cloneable;

    protected $table = 'inventory_variant_values';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'variant_id', 'name', 'created_from', 'created_by'];

    public function variant()
    {
        return $this->belongsTo('Modules\Inventory\Models\Variant');
    }
}
