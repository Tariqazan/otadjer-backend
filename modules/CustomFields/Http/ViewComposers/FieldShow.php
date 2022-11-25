<?php

namespace Modules\CustomFields\Http\ViewComposers;

use Illuminate\View\View;
use Modules\CustomFields\Events\LocationCodeReplacing;
use Modules\CustomFields\Traits\CustomFields;
use Modules\CustomFields\Traits\Permissions;

class FieldShow
{
    use CustomFields, Permissions;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if ($this->canCompose()) {
            return;
        }

        $request = request();

        $segment = $request->segment(2);

        if ($segment == 'signed' && $request->segment(3) == 'invoices') {
            $segment = 'sales';
        }

        $code = $segment . '.' . $request->segment(3);

        $code_replaced = event(new LocationCodeReplacing($code, $view), [], true);

        if (!empty($code_replaced)) {
            $code = $code_replaced;
        }
        
        $fields = $this->getFieldsByLocation($code);

        if ($fields->isEmpty()) {
            return;
        }

        $view_name = $view->getName();

        foreach ($fields as $field) {
            $show_type = 'default';
            $field_value = $this->getFieldValueByRequest($field, $request, $view);

            if ($view_name != 'components.documents.template.line-item' && $field->fieldLocation->sort_order == 'item_custom_fields') {
                continue;
            }

            if ($view_name == 'components.documents.template.line-item' && $field->fieldLocation->sort_order == 'item_custom_fields') {
                $show_type = 'items';
            }

            if ($view_name == 'components.transactions.template.default') {
                $show_type = 'transactions';
            }

            if ($view_name == 'sales.customers.show' ||
                $view_name == 'purchases.vendors.show' ||
                $view_name == 'inventory::items.show') {
                $show_type = 'informations';
            }

            $section = $this->getSection($view, $field);

            $view->getFactory()->startPush($section, view('custom-fields::field_show', compact('field', 'field_value', 'show_type')));
        }
    }
}
