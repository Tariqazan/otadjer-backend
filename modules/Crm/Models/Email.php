<?php

namespace Modules\Crm\Models;

use App\Abstracts\Model;
use App\Traits\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Crm\Database\Factories\Email as EmailFactory;

class Email extends Model
{
    use DateTime, HasFactory;

    protected $table = 'crm_emails';

    protected $fillable = [
        'company_id',
        'created_by',
        'emailable_id',
        'emailable_type',
        'from',
        'to',
        'subject',
        'body',
        'send'
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\Models\Auth\User', 'created_by', 'id');
    }

    public function emailable()
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
        return EmailFactory::new();
    }
}
