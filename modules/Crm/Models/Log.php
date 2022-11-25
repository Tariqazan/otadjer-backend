<?php

namespace Modules\Crm\Models;

use App\Abstracts\Model;
use App\Traits\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Database\Factories\Log as LogFactory;

class Log extends Model
{
    use DateTime, HasFactory;

    protected $table = 'crm_logs';

    protected $fillable = [
        'company_id',
        'created_by',
        'logable_id',
        'logable_type',
        'log_type',
        'date',
        'time',
        'subject',
        'description',
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by', 'id');
    }

    public function logable()
    {
        return $this->morphTo();
    }

    public function scopeInstance($query)
    {
        return $query;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return LogFactory::new();
    }
}
