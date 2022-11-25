<?php

namespace Modules\CustomFields\Models;

use App\Abstracts\Model;
use Modules\CustomFields\Casts\Translate;

class Type extends Model
{
    protected $table = 'custom_fields_types';

    protected $tenantable = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => Translate::class,
    ];
}
