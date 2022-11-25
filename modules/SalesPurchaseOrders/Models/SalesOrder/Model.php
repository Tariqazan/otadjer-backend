<?php

namespace Modules\SalesPurchaseOrders\Models\SalesOrder;

use App\Models\Document\Document;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\SalesPurchaseOrders\Database\Factories\SalesOrder as SalesOrderFactory;
use Modules\SalesPurchaseOrders\Models\SalesPurchaseOrderDocument;

class Model extends Document
{
    public const TYPE = 'sales-order';

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->addCloneableRelation('extra_param');
    }

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function converted_documents()
    {
        return $this->morphMany(SalesPurchaseOrderDocument::class, 'item');
    }

    public function extra_param(): HasOne
    {
        return $this->hasOne(ExtraParameter::class, 'document_id')
                    ->withDefault(['expected_shipment_date' => null]);
    }

    public function scopeSales(Builder $query): Builder
    {
        return $query->where($this->table . '.type', '=', self::TYPE);
    }

    public function scopeShipment($query, $date)
    {
        return $query->join('sales_purchase_orders_sales_extra_parameters', 'document_id', '=', "{$this->table}.id")->whereDate('expected_shipment_date', '=', $date);
    }

    public function scopeInvoiced($query)
    {
        return $query->where('status', 'invoiced');
    }

    public function scopeNotInvoiced($query)
    {
        return $query->where('status', '<>', 'invoiced');
    }

    public function getInvoicedAtAttribute($value): string
    {
        return $this->invoices()->orderBy('created_at', 'desc')->first();
    }

    public function getStatusLabelAttribute(): string
    {
        $label = parent::getStatusLabelAttribute();

        switch ($this->status) {
            case 'confirmed':
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
        return SalesOrderFactory::new();
    }
}
