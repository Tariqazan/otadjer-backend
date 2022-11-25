<?php

namespace Modules\WarehouseRoleManagement\Models;

use App\Abstracts\Model;

class UserWarehouse extends Model
{
    protected $table = 'inventory_user_warehouses';

    protected $tenantable = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['warehouse_id', 'user_id'];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function warehouse()
    {
        return $this->belongsTo('Modules\Inventory\Models\Warehouse');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User');
    }
}
