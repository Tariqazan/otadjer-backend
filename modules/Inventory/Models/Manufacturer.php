<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;

class Manufacturer extends Model
{
    use Cloneable;

    protected $table = 'inventory_manufacturers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'name', 'description', 'enabled'];

    /**
     * Sortable columns.
     *
     * @var array
     */
    public $sortable = ['name', 'description', 'enabled'];

    public function items()
    {
        return $this->hasMany('App\Models\Common\Item');
    }

    public function manufacturer_vendors()
    {
        return $this->hasMany('Modules\Inventory\Models\ManufacturerVendor', 'manufacturer_id', 'id');
    }
}
