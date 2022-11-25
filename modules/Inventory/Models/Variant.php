<?php

namespace Modules\Inventory\Models;

use App\Abstracts\Model;
use Bkwld\Cloner\Cloneable;
use Modules\Inventory\Database\Factories\Variant as VariantFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Variant extends Model
{
    use Cloneable, HasFactory;

    protected $table = 'inventory_variants';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['company_id', 'name', 'enabled', 'created_from', 'created_by'];

    /**
     * Sortable columns.
     *
     * @var array
     */
    public $sortable = ['name', 'enabled'];

    /**
     * Clonable relationships.
     *
     * @var array
     */
    public $cloneable_relations = ['values'];

    public function values()
    {
        return $this->hasMany('Modules\Inventory\Models\VariantValue');
    }

    public function item_groups()
    {
        return $this->hasMany('Modules\Inventory\Models\ItemGroupVariant');
    }

     /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return VariantFactory::new();
    }
}
