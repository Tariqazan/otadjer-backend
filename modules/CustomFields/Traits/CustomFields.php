<?php

namespace Modules\CustomFields\Traits;

use App\Models\Document\Document;
use App\Traits\DateTime;
use App\Traits\Modules;
use App\Utilities\Date;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Modules\CustomFields\Models\Field;
use Modules\CustomFields\Models\Location;
use Modules\Expenses\Models\ExpenseClaim;

trait CustomFields
{
    use DateTime, Modules;

    public function getFieldsByLocation($code)
    {
        $location = Location::code($code)->first();

        if (is_null($location)) {
            return collect([]);
        }

        return Field::with(['fieldLocation', 'fieldTypeOption', 'type', 'location'])->enabled()->orderBy('name')->byLocation($location->id)->get();
    }

    public function getInputAttributes(Field $field): array
    {
        switch ($field->type->type) {
            case 'date':
                $attributes = [
                    'v-model' => 'form.' . $field->code,
                    'show-date-format' => $this->getCompanyDateFormat(),
                ];

                break;

            case 'dateTime':
                $attributes = [
                    'v-model' => 'form.' . $field->code,
                    'show-date-format' => $this->getCompanyDateFormat() . ' H:i',
                ];

                break;

            case 'time':
            case 'text':
            case 'textarea':

                $attributes = [
                    'v-model' => 'form.' . $field->code,
                    'placeholder' => $this->getDefaultValue($field),
                ];

                break;

            case 'select':
                $attributes = [
                    'v-model' => 'form.' . $field->code,
                    'model' => 'this.' . $field->code,
                ];

                break;

            default:
                $attributes = [];

                break;
        }

        if (Str::contains($field->rule, 'required')) {
            $attributes['required'] = 'required';
        }

        if ($field->type->type == 'textarea') {
            $attributes['rows'] = '3';
        }

        return $attributes;
    }

    public function getInputAttributesForItems(Field $field): array
    {
        switch ($field->type->type) {
            case 'text':
            case 'textarea':
                $attributes = [
                    'data-item' => $field->code,
                    'v-model' => null,
                    ':value' => 'row.' . $field->code . ' = this.' . $field->code . '[index]',
                    '@input' => 'row.' . $field->code . ' = $event.target.value; this.' . $field->code . '[index] = $event.target.value; onBindingItemField(index, "' . $field->code . '")',
                    'placeholder' => $this->getDefaultValue($field),
                ];

                break;

            case 'date':
            case 'time':
            case 'dateTime':
                $attributes = [
                    'data-item' => $field->code,
                    'v-model' => 'row.' . $field->code,
                    'change' => 'onBindingItemField(index, "' . $field->code . '")',
                    'model' => 'this.' . $field->code . '[index]',
                    'show-date-format' => $this->getCompanyDateFormat(),
                ];

                break;

            case 'select':
                $attributes = [
                    'data-item' => $field->code,
                    'v-model' => 'row.' . $field->code,
                    'visible-change' => 'onBindingItemField(index, "' . $field->code . '")',
                    'model' => 'this.' . $field->code . '[index]',
                ];

                break;

            case 'checkbox':
                $attributes = [
                    ':id' => '"checkbox-' . $field->code . '-:item_id-" + index',
                    'data-item' => $field->code,
                    '@change' => 'onBindingItemField(index, "' . $field->code . '")',
                    'v-model' => 'row.' . $field->code,
                ];

                break;

            default:
                $attributes = [];

                break;
        }

        if (Str::contains('required', $field->rule)) {
            $attributes['required'] = 'required';
        }

        if ($field->type->type == 'textarea') {
            $attributes['rows'] = '3';
        }

        return $attributes;
    }

    public function getInputValues($field, $request)
    {
        $value = null;

        // $model will be injected from route parameters
        $model = $request->route(Str::replace('-', '_', Str::singular((string) $request->segment(3))));

        if (is_null($model)) {
            return $value;
        }

        $model_class = get_class($model);

        if ($model instanceof ExpenseClaim) {
            $model_class = Document::class;
        }

        $value = $this->getDefaultValue($field);

        // getting recorded value of field
        $field_value = $field->field_values()->record($model->id, $model_class)->first();

        if (!is_null($field_value) && !empty($field_value->value)) {
            $value = $field_value->value;
        }

        return $value;
    }

    public function getInputValuesForItems($field, $request): array
    {
        $default_value = null;
        $values = [];

        if (!$request->routeIs('invoices.edit') &&
            !$request->routeIs('bills.edit') &&
            !$request->routeIs('expenses.expense-claims.edit')) {
            return $values;
        }

        $default_value = $this->getDefaultValue($field);

        $document = $request->route(Str::replace('-', '_', Str::singular((string) $request->segment(3))));

        foreach ($document->items as $item) {
            $field_value = $field->field_values()->record($item->id, get_class($item))->first();

            if (is_null($field_value) || empty($field_value->value)) {
                $values[] = $default_value;

                continue;
            }

            $values[] = $field_value->value;
        }

        return $values;
    }

    public function getFieldValueByRequest($field, $request, $view)
    {
        $value = null;

        // $model will be injected from route parameters
        $model = $request->route(Str::replace('-', '_', Str::singular((string) $request->segment(3))));

        if (is_null($model)) {
            return $value;
        }

        $model_class = get_class($model);

        if ($model instanceof ExpenseClaim) {
            $model_class = Document::class;
        }

        $value = $this->getDefaultValue($field);

        // getting recorded value of field
        $field_value = $field->field_values()->record($model->id, $model_class)->first();

        if (isset($view->getData()['item']) && $view->getData()['item']) {
            $item_model = $view->getData()['item'];
            $field_value = $field->field_values()->record($item_model->id, get_class($item_model))->first();
        }

        if (!is_null($field_value) && !is_null($field_value->value)) {
            $value = $field_value->value;

            if ($this->hasMultipleOptions($field)) {
                $field_type_options = $field->fieldTypeOption->pluck('value', 'id');
            }

            if (!is_array($field_value->value) && isset($field_type_options[$field_value->value])) {
                $value = $field_type_options[$field_value->value];
            }

            if (is_array($field_value->value)) {
                $value = null;

                foreach ($field_value->value as $item) {
                    if (!isset($field_type_options[$item])) {
                        continue;
                    }

                    $value .= "{$field_type_options[$item]}, ";
                }

                if ($value != null) {
                    $value = rtrim($value, ", ");
                }
            }

            if ($field_value->type == 'radio' && $value == 0) {
                $value = trans('general.no');
            }

            if ($field_value->type == 'radio' && $value == 1) {
                $value = trans('general.yes');
            }
        }

        if ($field->type->type == 'date') {
            $value = company_date($value);
        }

        if ($field->type->type == 'dateTime') {
            $value = Date::parse($value)->format(company_date_format() . ' H:i');
        }

        return $value;
    }

    public function getFieldValueByModel($field, $model)
    {
        $value = null;

        if (is_null($model)) {
            return $value;
        }

        $value = $this->getDefaultValue($field);

        $field_value = $field->field_values()->record($model->id, get_class($model))->first();

        if (!is_null($field_value) && !empty($field_value->value)) {
            $value = $field_value->value;

            if ($this->hasMultipleOptions($field)) {
                $field_type_options = $field->fieldTypeOption->pluck('value', 'id');
            }

            if (isset($field_type_options[$field_value->value])) {
                $value = $field_type_options[$field_value->value];
            }
        }

        return $value;
    }

    public function getLocations(): array
    {
        $not_in = [];

        if (!$this->moduleIsEnabled('employees')) {
            $not_in[] = 'employees.employees';
            $not_in[] = 'employees.positions';
        }

        if (!$this->moduleIsEnabled('assets')) {
            $not_in[] = 'assets.assets';
        }

        if (!$this->moduleIsEnabled('expenses')) {
            $not_in[] = 'expenses.expense-claims';
        }

        return Location::whereNotIn('code', $not_in)->pluck('name', 'id')->toArray();
    }

    public function hasMultipleOptions(Field $field): bool
    {
        if ($field->fieldTypeOption->count() == 1) {
            return false;
        }

        return true;
    }

    public function getExportableFields($event)
    {
        $location = [
            'App\Exports\Common\Sheets\Items' => 'common.items',
            'App\Exports\Sales\Sheets\Invoices' => 'sales.invoices',
            'App\Exports\Sales\Sheets\InvoiceItems' => 'sales.invoices',
            'App\Exports\Sales\Revenues' => 'sales.revenues',
            'App\Exports\Sales\Customers' => 'sales.customers',
            'App\Exports\Purchases\Sheets\Bills' => 'purchases.bills',
            'App\Exports\Purchases\Sheets\BillItems' => 'purchases.bills',
            'App\Exports\Purchases\Payments' => 'purchases.payments',
            'App\Exports\Purchases\Vendors' => 'purchases.vendors',
            'App\Exports\Banking\Transfers' => 'banking.transfers',
            'Modules\Employees\Exports\Employees' => 'employees.employees',
            'Modules\Employees\Exports\Positions' => 'employees.positions',
        ];

        if (!array_key_exists(get_class($event->class), $location)) {
            return collect([]);
        }

        $fields = $this->getFieldsByLocation($location[get_class($event->class)]);

        if (in_array(get_class($event->class), ['App\Exports\Sales\Sheets\InvoiceItems', 'App\Exports\Purchases\Sheets\BillItems'])) {
            $fields = $fields->reject(function ($field) {
                return $field->fieldLocation->sort_order != 'item_custom_fields';
            });
        }

        if (in_array(get_class($event->class), ['App\Exports\Sales\Sheets\Invoices', 'App\Exports\Purchases\Sheets\Bills'])) {
            $fields = $fields->reject(function ($field) {
                return $field->fieldLocation->sort_order == 'item_custom_fields';
            });
        }

        return $fields;
    }

    /**
     * It gets push section of custom field
     *
     * @param \Illuminate\View\View $view
     * @param \Modules\CustomFields\Models\Field $field
     * @return string
     */
    public function getSection(View $view, Field $field): string
    {
        // modal dialogs
        $modal_sections = [
            'customers.phone' => 'address',
            'customers.website' => 'address',
            'customers.reference' => 'address',
            'customers.enabled' => 'address',
            'customers.create_user' => 'address',
            'vendors.phone' => 'address',
            'vendors.website' => 'address',
            'vendors.logo' => 'address',
            'vendors.reference' => 'address',
            'vendors.enabled' => 'address',
            'items.picture' => 'category_id',
            'items.enabled' => 'category_id',
            'accounts.bank_name' => 'opening_balance',
            'accounts.bank_phone' => 'opening_balance',
            'accounts.bank_address' => 'opening_balance',
            'accounts.default_account' => 'opening_balance',
            'accounts.enabled' => 'opening_balance',
            'documents.contact_id' => 'reference',
            'documents.category_id' => 'reference',
            'documents.document_id' => 'reference',
            'documents.attachment' => 'reference',
        ];

        $modal_key = explode('.', $view->getName())[1] . '.' . substr($field->fieldLocation->sort_order, 0, strpos($field->fieldLocation->sort_order, '_input'));

        if (Str::startsWith($view->getName(), 'modals.') &&
            array_key_exists($modal_key, $modal_sections)) {
            return str_replace(explode('.', $modal_key)[1], $modal_sections[$modal_key], $field->fieldLocation->sort_order);
        }

        // contact based forms fe customers, vendors
        $contact_sections = [
            'sales.customers.show' => 'customer_address_end',
            'purchases.vendors.show' => 'vendor_address_end',
        ];

        if (array_key_exists($view->getName(), $contact_sections)) {
            return $contact_sections[$view->getName()];
        }

        // inventory app
        $inventory_items_sections = [
            'inventory::items.show' => 'tax_input_end',
        ];

        if (array_key_exists($view->getName(), $inventory_items_sections)) {
            return $inventory_items_sections[$view->getName()];
        }

        // document items
        if ($view->getName() == 'components.documents.template.line-item' &&
            $field->fieldLocation->sort_order == 'item_custom_fields') {
            return $field->fieldLocation->sort_order . '_' . $view->getData()['item']->id;
        }

        // expenses app
        $sections_mapping = [
            'approver_user_id' => 'due_at_input_end',
            'employee_contact_id' => 'due_at_input_end',
            'reimburse' => 'due_at_input_end',
            'category_id' => 'due_at_input_end',
            'attachment' => 'due_at_input_end',
        ];

        $base_sort_order = Str::replace(['_input', '_start', '_end'], '', $field->fieldLocation->sort_order);

        if ($field->location->code == 'expenses.expense-claims' &&
            array_key_exists($base_sort_order, $sections_mapping)) {
            return $sections_mapping[$base_sort_order];
        }

        // default value
        return $field->fieldLocation->sort_order;
    }

    public function getValidationRules()
    {
        return [
            'required' => trans('custom-fields::general.validation_rules.required'),
            'string' => trans('custom-fields::general.validation_rules.string'),
            'integer' => trans('custom-fields::general.validation_rules.integer'),
            'date' => trans('custom-fields::general.validation_rules.date'),
            'email' => trans('custom-fields::general.validation_rules.email'),
            'url' => trans('custom-fields::general.validation_rules.url'),
            'password' => trans('custom-fields::general.validation_rules.password'),
        ];
    }

    /**
     * It gets default value if field has not multiple options
     * 
     * @param Field $field
     * @return string|null
     */
    public function getDefaultValue(Field $field)
    {
        if (!$this->hasMultipleOptions($field)) {
            return $field->fieldTypeOption->first()->value;
        }

        return null;
    }
}
