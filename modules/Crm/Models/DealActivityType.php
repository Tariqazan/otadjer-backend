<?php

namespace Modules\Crm\Models;

use App\Abstracts\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Database\Factories\DealActivityType as ActivityTypeFactory;

class DealActivityType extends Model
{
    use HasFactory;

    protected $table = 'crm_deal_activity_types';

    protected $fillable = [
        'company_id',
        'created_by',
        'name',
        'icon',
        'rank'
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by', 'id');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ActivityTypeFactory::new();
    }
}
