<?php

namespace Modules\Crm\Models;

use App\Abstracts\Model;
use App\Traits\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Database\Factories\Note as NoteFactory;

class Note extends Model
{
    use DateTime, HasFactory;

    protected $table = 'crm_notes';

    protected $fillable = [
        'company_id',
        'created_by',
        'noteable_id',
        'noteable_type',
        'message'
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by', 'id');
    }

    public function noteable()
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
        return NoteFactory::new();
    }
}
