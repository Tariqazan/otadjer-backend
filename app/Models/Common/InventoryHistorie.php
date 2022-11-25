<?php

namespace App\Models\Common;

use App\Traits\Owners;
use App\Traits\Sources;
use App\Traits\Tenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Media as BaseMedia;

class InventoryHistorie extends BaseMedia
{
   // use Owners, SoftDeletes, Sources, Tenants;
	use SoftDeletes;
    //protected $dates = ['deleted_at'];

   protected $guarded = [];
	
	protected $table = 'inventory_histories';

   //protected $appends = ['new_quantity'];

  /* public function getNewQuantityAttribute()
   {
      return $this->getQuantity()->value("quantity");
   }

   public function getQuantity()
   {
      return $this->hasMany('App\Models\Common\DocumentItem','item_id','item_id')->select(["item_id",'quantity']);
   }*/
}
