<?php

namespace Modules\CustomFields\Observers\Document;

use App\Abstracts\Observer;
use App\Models\Document\Document;
use Modules\Expenses\Models\ExpenseClaim;
use Modules\CustomFields\Models\FieldValue;
use Modules\CustomFields\Traits\CustomFields;
use App\Models\Document\DocumentItem as Model;

class DocumentItem extends Observer
{
    use CustomFields;

    /**
     * Listen to the created event.
     *
     * @param  Model $document_item
     *
     * @return void
     */
    public function created(Model $document_item)
    {
        $custom_fields = [];

        if ($document_item->type == Document::INVOICE_TYPE) {
            $custom_fields = $this->getFieldsByLocation('sales.invoices');
        }

        if ($document_item->type == Document::BILL_TYPE) {
            $custom_fields = $this->getFieldsByLocation('purchases.bills');
        }

        if ($this->moduleIsEnabled('expenses') && $document_item->type == ExpenseClaim::TYPE) {
            $custom_fields = $this->getFieldsByLocation('expenses.expense-claims');
        }

        foreach ($custom_fields as $custom_field) {
            if ($custom_field->fieldLocation->sort_order != 'item_custom_fields') {
                continue;
            }

            $value = null;

            if (isset($document_item->allAttributes[$custom_field->code])) {
                $value = $document_item->allAttributes[$custom_field->code];
            }

            FieldValue::create([
                'company_id' => company_id(),
                'field_id' => $custom_field->id,
                'type_id' => $custom_field->type_id,
                'type' => $custom_field->type->type,
                'location_id' => $custom_field->locations,
                'model_id' => $document_item->id,
                'model_type' => get_class($document_item),
                'value' => $value,
            ]);
        }
    }

    /**
     * Listen to the deleted event.
     *
     * @param  Model $document_item
     *
     * @return void
     */
    public function deleted(Model $document_item)
    {
        FieldValue::record($document_item->id, get_class($document_item))->delete();
    }
}
