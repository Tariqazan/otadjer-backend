<?php

namespace Modules\Estimates\Models;

use App\Models\Document\Document;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Estimates\Database\Factories\Estimate as EstimateFactory;

class Estimate extends Document
{
    public const TYPE = 'estimate';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->addCloneableRelation('extra_param');
    }

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(EstimateDocument::class);
    }

    public function extra_param(): HasOne
    {
        return $this->hasOne(EstimateExtraParameter::class, 'document_id')
                    ->withDefault(['expire_at' => null]);
    }

    public function scopeEstimate(Builder $query): Builder
    {
        return $query->where("{$this->table}.type", '=', self::TYPE);
    }

    public function scopeExpire($query, $date)
    {
        return $query->join('estimates_extra_parameters', 'document_id', '=', "{$this->table}.id")->whereDate('expire_at', '=', $date);
    }

    public function scopeInvoiced($query)
    {
        return $query->where('status', 'invoiced');
    }

    public function scopeNotInvoiced($query)
    {
        return $query->where('status', '<>', 'invoiced');
    }

    // @todo test duplicate for extra params
    public function onCloning($src, $child = null)
    {
        parent::onCloning($src, $child);
    }

    public function getInvoicedAtAttribute($value): string
    {
        return $this->invoices()->orderBy('created_at', 'desc')->first();
    }

    public function getStatusLabelAttribute(): string
    {
        $label = parent::getStatusLabelAttribute();

        switch ($this->status) {
            case 'approved':
                $label = 'success';
                break;
            case 'invoiced':
                $label = 'info';
                break;
            case 'refused':
                $label = 'danger';
                break;
            case 'expired':
                $label = 'secondary';
                break;
        }

        return $label;
    }

    /**
     * @inheritDoc
     */
    protected static function newFactory(): Factory
    {
        return EstimateFactory::new();
    }
}
