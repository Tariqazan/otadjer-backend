<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;
use Modules\Inventory\Database\Factories\TransferOrder as TransferOrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferOrder extends Model
{
    use Cloneable, HasFactory;

    protected $table = 'inventory_transfer_orders';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'date', 'transfer_order', 'transfer_order_number', 'reason', 'source_warehouse_id', 'destination_warehouse_id', 'status', 'created_from', 'created_by'];

    public $cloneable_relations = ['items'];

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item')->withDefault(['name' => trans('general.na')]);
    }

    public function source_warehouse()
    {
        return $this->belongsTo('Modules\Inventory\Models\Warehouse', 'source_warehouse_id', 'id')->withDefault(['name' => trans('general.na')]);
    }

    public function destination_warehouse()
    {
        return $this->belongsTo('Modules\Inventory\Models\Warehouse', 'destination_warehouse_id', 'id')->withDefault(['name' => trans('general.na')]);
    }

    public function transfer_order_items()
    {
        return $this->hasMany('Modules\Inventory\Models\TransferOrderItem');
    }

    public function histories()
    {
        return $this->hasMany('Modules\Inventory\Models\TransferOrderHistory');
    }

    public function getReadyAttribute()
    {
        return $this->histories->where('status', 'ready')->first();
    }

    public function getInTransferAttribute()
    {
        return $this->histories->where('status', 'in_transfer')->first();
    }

    public function getTransferredAttribute()
    {
        return $this->histories->where('status', 'transferred')->first();
    }

    public function getItemQuantityAttribute()
    {
        if (empty($this->item_id)) {
            return 0;
        }

        return \Modules\Inventory\Models\Item::where('warehouse_id', $this->source_warehouse_id)
            ->where('item_id', $this->item_id)
            ->value('opening_stock');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return TransferOrderFactory::new();
    }
}
