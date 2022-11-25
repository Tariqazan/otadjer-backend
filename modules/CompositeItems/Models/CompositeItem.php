<?php

namespace Modules\CompositeItems\Models;

use App\Abstracts\Model;
use App\Models\Document\Document;
use App\Traits\Currencies;
use App\Traits\Media;
use Bkwld\Cloner\Cloneable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class CompositeItem extends Model
{
    use Cloneable, Currencies, HasFactory, Media;

    protected $table = 'composite_items_composite_items';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */

    protected $fillable = [
        'company_id',
        'item_id',
        'sku',
        'barcode',
        'unit',
        'returnable',
        'track_inventory',
        'created_from',
        'created_by'
    ];

    /**
     * Sortable columns.
     *
     * @var array
     */
    protected $sortable = ['name', 'category', 'sale_price', 'purchase_price', 'enabled'];

    public function item()
    {
        return $this->belongsTo('App\Models\Common\Item');
    }

    public function composite_items()
    {
        return $this->hasMany('Modules\CompositeItems\Models\Item', 'composite_item_id', 'id');
    }

    public function scopeCanTrack(Builder $query)
    {
        return $query->where('track_inventory', '=', '1');
    }
}
