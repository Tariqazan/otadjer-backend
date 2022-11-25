<?php

namespace Modules\SalesPurchaseOrders\Models\PurchaseOrder;

use App\Models\Document\Document;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\SalesPurchaseOrders\Database\Factories\PurchaseOrder as PurchaseOrderFactory;
use Modules\SalesPurchaseOrders\Models\SalesPurchaseOrderDocument;

class Model extends Document
{
    public const TYPE = 'purchase-order';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->addCloneableRelation('extra_param');
    }

    public function bills(): BelongsToMany
    {
        return $this->belongsToMany(Bill::class);
    }

    public function converted_bills()
    {
        return $this->morphMany(SalesPurchaseOrderDocument::class, 'item');
    }

    public function extra_param(): HasOne
    {
        return $this->hasOne(ExtraParameter::class, 'document_id')
                    ->withDefault(['expected_delivery_date' => null]);
    }

    public function scopePurchase(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', self::TYPE);
    }

    public function scopeDelivery($query, $date)
    {
        return $query->join('sales_purchase_orders_purchase_extra_parameters', 'document_id', '=', "{$this->table}.id")->whereDate('expected_delivery_date', '=', $date);
    }

    public function scopeBilled($query)
    {
        return $query->where('status', 'billed');
    }

    public function scopeNotBilled($query)
    {
        return $query->where('status', '<>', 'billed');
    }

    public function getBilledAtAttribute($value): string
    {
        return $this->bills()->orderBy('created_at', 'desc')->first();
    }

    public function getStatusLabelAttribute(): string
    {
        $label = parent::getStatusLabelAttribute();

        switch ($this->status) {
            case 'issued':
                $label = 'success';
                break;
            case 'invoiced':
                $label = 'info';
                break;
        }

        return $label;
    }

    protected static function newFactory(): Factory
    {
        return PurchaseOrderFactory::new();
    }
}
