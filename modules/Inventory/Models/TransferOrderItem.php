<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;
use Modules\Inventory\Database\Factories\TransferOrder as TransferOrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransferOrderItem extends Model
{
    use Cloneable, HasFactory;

    protected $table = 'inventory_transfer_order_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'transfer_order_id', 'item_id', 'item_quantity', 'transfer_quantity', 'created_from', 'created_by'];

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item')->withDefault(['name' => trans('general.na')]);
    }

}
