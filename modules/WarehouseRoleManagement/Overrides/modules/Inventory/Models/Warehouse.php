<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;
use Modules\Inventory\Database\Factories\Warehouse as WarehouseFactory;
use Modules\Inventory\Models\Item;
use Modules\Inventory\Models\History;
use Modules\WarehouseRoleManagement\Scopes\Warehouse as Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use Cloneable, HasFactory;

    protected $table = 'inventory_warehouses';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'address', 'country', 'city', 'zip_code', 'state', 'description', 'email', 'enabled', 'name', 'phone', 'created_from', 'created_by'];

    /**
     * Sortable columns.
     *
     * @var array
     */
    public $sortable = ['name', 'email', 'phone', 'enabled', 'description'];

    /**
     * Clonable relationships.
     *
     * @var array
     */
    public $cloneable_relations = ['items', 'users'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new Scope);
    }

    public function items()
    {
        return $this->hasMany('Modules\Inventory\Models\Item', 'warehouse_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany('Modules\Inventory\Models\History', 'warehouse_id', 'id');
    }

    public function getCoreItemsAttribute()
    {
        $items = null;

        foreach ($this->items as $key => $inventory_item) {
            if (! $inventory_item->item->id) {
                continue;
            }

            $items[$key] = $inventory_item->item;
        }

        return $items;
    }

    public function getItemPaginationAttribute()
    {
        return Item::where('warehouse_id', $this->id)->collect();
    }

    public function getHistoryPaginationAttribute()
    {
        return History::where('warehouse_id', $this->id)->collect();
    }

    public function getDefaultWarehouseAttribute()
    {
        return (setting('inventory.default_warehouse', 1) == $this->id) ? true : false;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return WarehouseFactory::new();
    }
}
