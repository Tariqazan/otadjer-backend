<?php

namespace Modules\CustomFields\Models;

use App\Abstracts\Model;
use Modules\CustomFields\Casts\TranslateChoice;

class Location extends Model
{
    protected $table = 'custom_fields_locations';

    protected $tenantable = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => TranslateChoice::class,
    ];

    public function scopeCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
