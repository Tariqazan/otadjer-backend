<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;

class WarehouseItem extends Model
{
    use Cloneable;

    protected $table = 'inventory_warehouse_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'warehouse_id', 'item_id'];

    public function stock()
    {
        return 100;
    }

    public function warehouse()
    {
        return $this->belongsTo('Modules\Inventory\Models\Warehouse');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item');
    }

    public function getQuantityAttribute()
    {
        $quantity = Item::where('warehouse_id', $warehouse->id)->pluck('opening_stock');

        $sent = $this->histories()->where('status', 'sent')->first();

        return ($sent) ? $sent->created_at : null;
    }
}
