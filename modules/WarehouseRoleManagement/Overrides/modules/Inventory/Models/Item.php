<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;
use Modules\Inventory\Database\Factories\Item as ItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\WarehouseRoleManagement\Scopes\InventoryItem as Scope;

class Item extends Model
{
    use Cloneable, HasFactory;

    protected $table = 'inventory_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'default_warehouse',
        'item_id',
        'sku',
        'unit',
        'opening_stock',
        'opening_stock_value',
        'reorder_level',
        'vendor_id',
        'warehouse_id',
        'returnable',
        'barcode',
        'created_from',
        'created_by'
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new Scope);
    }
    
    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item')->withDefault(['name' => trans('general.na')]);
    }

    public function values()
    {
        return $this->hasMany('Modules\Inventory\Models\VariantValue');
    }

    public function warehouse()
    {
        return $this->belongsTo('Modules\Inventory\Models\Warehouse');
    }

    public function history()
    {
        return $this->belongsTo('Modules\Inventory\Models\History', 'item_id', 'item_id');
    }

    public function histories()
    {
        return $this->hasMany('Modules\Inventory\Models\History', 'item_id', 'item_id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ItemFactory::new();
    }

    /**
     * Get the current balance.
     *
     * @return string
     */
    /*
    public function getWarehouseIdAttribute()
    {
        $item_warehouse = $this->belongsTo('Modules\Inventory\Models\WarehouseItem', 'item_id', 'item_id')->first();

        return $item_warehouse->warehouse_id;
    }
    */
}
