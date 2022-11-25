<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;
use Modules\Inventory\Database\Factories\TransferOrder as TransferOrderFactory;

class TransferOrderHistory extends Model
{
    use Cloneable;

    protected $table = 'inventory_transfer_order_histories';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'created_by', 'transfer_order_id', 'status', 'created_from', 'created_by'];

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by', 'id');
    }
}
