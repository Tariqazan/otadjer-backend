<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;

class DocumentItem extends Model
{
    protected $table = 'inventory_document_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'type', 'document_id', 'document_item_id', 'item_id', 'warehouse_id', 'quantity', 'created_from', 'created_by'];

    public function document()
    {
        return $this->belongsTo('App\Models\Document\Document');
    }

    public function document_item()
    {
        return $this->belongsTo('App\Models\Document\DocumentItem');
    }

    public function document_items()
    {
        return $this->hasMany('App\Models\Document\DocumentItem', 'document_id', 'document_id');
    }

    public function multi_document_item()
    {
        return $this->document_items()->where('item_id', $this->item_id);
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item');
    }
}
