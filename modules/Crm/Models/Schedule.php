<?php

namespace Modules\Crm\Models;

use App\Abstracts\Model;
use App\Traits\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Database\Factories\Schedule as ScheduleFactory;

class Schedule extends Model
{
    use DateTime, HasFactory;

    protected $table = 'crm_schedules';

    protected $fillable = [
        'company_id',
        'created_by',
        'scheduleable_id',
        'scheduleable_type',
        'schedule_type',
        'name',
        'description',
        'started_at',
        'started_time_at',
        'ended_at',
        'ended_time_at',
        'user_id'
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User', 'user_id', 'id');
    }

    public function scheduleable()
    {
        return $this->morphTo();
    }

    public function contact()
    {
        return $this->belongsTo('Modules\Crm\Models\Contact', 'scheduleable_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo('Modules\Crm\Models\Company', 'scheduleable_id', 'id');
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
        return ScheduleFactory::new();
    }
}

