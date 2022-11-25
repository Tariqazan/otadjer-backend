<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;
use Modules\Inventory\Database\Factories\Adjustment as AdjustmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adjustment extends Model
{
    use Cloneable, HasFactory;

    protected $table = 'inventory_adjustments';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'date', 'adjustment_number', 'warehouse_id', 'description', 'reason', 'created_from', 'created_by'];

    public $cloneable_relations = ['items'];

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item')->withDefault(['name' => trans('general.na')]);
    }

    public function adjustment_items()
    {
        return $this->hasMany('Modules\Inventory\Models\AdjustmentItem');
    }

    public function warehouse()
    {
        return $this->belongsTo('Modules\Inventory\Models\Warehouse', 'warehouse_id', 'id')->withDefault(['name' => trans('general.na')]);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return AdjustmentFactory::new();
    }
}
