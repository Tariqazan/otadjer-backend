<?php

namespace App\Models\Common;

use App\Traits\Owners;
use App\Traits\Sources;
use App\Traits\Tenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Media as BaseMedia;

class InventoryItem extends BaseMedia
{
   // use Owners, SoftDeletes, Sources, Tenants;

    //protected $dates = ['deleted_at'];

    protected $guarded = [];
	
	protected $table = 'inventory_items';
}
