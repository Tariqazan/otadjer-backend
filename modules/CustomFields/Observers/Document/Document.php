<?php

namespace Modules\CustomFields\Observers\Document;

use App\Abstracts\Observer;
use App\Models\Document\Document as Model;
use Modules\CustomFields\Models\Field;
use Modules\CustomFields\Models\FieldValue;
use Modules\CustomFields\Traits\CustomFields;
use Modules\Expenses\Models\ExpenseClaim;

class Document extends Observer
{
    use CustomFields;

    /**
     * Listen to the created event.
     *
     * @param  Model $document
     *
     * @return void
     */
    public function created(Model $document)
    {
        $custom_fields = [];

        if ($document->type == Model::INVOICE_TYPE) {
            $custom_fields = $this->getFieldsByLocation('sales.invoices');
        }

        if ($document->type == Model::BILL_TYPE) {
            $custom_fields = $this->getFieldsByLocation('purchases.bills');
        }

        if ($this->moduleIsEnabled('expenses') && $document->type == ExpenseClaim::TYPE) {
            $custom_fields = $this->getFieldsByLocation('expenses.expense-claims');
        }

        foreach ($custom_fields as $custom_field) {
            if ($custom_field->fieldLocation->sort_order == 'item_custom_fields') {
                continue;
            }

            $value = null;

            if (isset($document->allAttributes[$custom_field->code])) {
                $value = $document->allAttributes[$custom_field->code];
            }

            FieldValue::create([
                'company_id' => company_id(),
                'field_id' => $custom_field->id,
                'type_id' => $custom_field->type_id,
                'type' => $custom_field->type->type,
                'location_id' => $custom_field->locations,
                'model_id' => $document->id,
                'model_type' => get_class($document),
                'value' => $value,
            ]);
        }
    }

    public function saved(Model $document)
    {
        $method = request()->getMethod();

        if ($method == 'PATCH') {
            $this->updated($document);
        }
    }

    /**
     * Listen to the created event.
     *
     * @param  Model $document
     *
     * @return void
     */
    public function updated(Model $document)
    {
        $skips = $custom_fields = [];

        $custom_field_values = FieldValue::record($document->id, get_class($document))->get();

        if ($document->type == Model::INVOICE_TYPE) {
            $custom_fields = $this->getFieldsByLocation('sales.invoices');
        }

        if ($document->type == Model::BILL_TYPE) {
            $custom_fields = $this->getFieldsByLocation('purchases.bills');
        }

        if ($this->moduleIsEnabled('expenses') && $document->type == ExpenseClaim::TYPE) {
            $custom_fields = $this->getFieldsByLocation('expenses.expense-claims');
        }

        $request = request();

        if (!isset($request->_token)) {
            return;
        }

        if ($custom_field_values) {
            foreach ($custom_field_values as $custom_field_value) {
                $custom_field = Field::find($custom_field_value->field_id);

                if ($custom_field->fieldLocation->sort_order == 'item_custom_fields') {
                    continue;
                }

                if (empty($custom_field)) {
                    continue;
                }

                $value = $custom_field_value->value;

                if (isset($document->allAttributes[$custom_field->code])) {
                    $value = $document->allAttributes[$custom_field->code];
                }

                $custom_field_value->update([
                    'company_id' => company_id(),
                    'field_id' => $custom_field->id,
                    'type_id' => $custom_field->type_id,
                    'type' => $custom_field->type->type,
                    'location_id' => $custom_field->locations,
                    'model_id' => $document->id,
                    'model_type' => get_class($document),
                    'value' => $value,
                ]);

                $skips[] = $custom_field->id;
            }
        }

        if ($custom_fields) {
            foreach ($custom_fields as $custom_field) {
                if ($custom_field->fieldLocation->sort_order == 'item_custom_fields') {
                    continue;
                }

                if (in_array($custom_field->id, $skips)) {
                    continue;
                }

                $value = null;

                if (isset($document->allAttributes[$custom_field->code])) {
                    $value = $document->allAttributes[$custom_field->code];
                }

                $custom_field_value = FieldValue::create([
                    'company_id' => company_id(),
                    'field_id' => $custom_field->id,
                    'type_id' => $custom_field->type_id,
                    'type' => $custom_field->type->type,
                    'location_id' => $custom_field->locations,
                    'model_id' => $document->id,
                    'model_type' => get_class($document),
                    'value' => $value,
                ]);
            }
        }
    }

    /**
     * Listen to the deleted event.
     *
     * @param  Model $document
     *
     * @return void
     */
    public function deleted(Model $document)
    {
        FieldValue::record($document->id, get_class($document))->delete();
    }
}
