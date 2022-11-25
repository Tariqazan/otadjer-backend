<?php

namespace Modules\CustomFields\Http\ViewComposers;

use Illuminate\View\View;
use Modules\CustomFields\Events\LocationCodeReplacing;
use Modules\CustomFields\Traits\CustomFields;
use Modules\CustomFields\Traits\Permissions;

class Field
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

        $code = $request->segment(2) . '.' . $request->segment(3);

        $code_replaced = event(new LocationCodeReplacing($code, $view), [], true);

        if (!empty($code_replaced)) {
            $code = $code_replaced;
        }

        $fields = $this->getFieldsByLocation($code);

        if ($fields->isEmpty()) {
            return;
        }

        foreach ($fields as $field) {
            $input_col = $field->class;
            $input_type = $field->type->type . 'Group';

            if ($field->type->type == 'checkbox') {
                $input_options = $field->fieldTypeOption()->get();
            } else {
                $input_options = $field->fieldTypeOption->pluck('value', 'id');
            }

            if ($field->fieldLocation->sort_order == 'item_custom_fields') {
                $input_attributes = $this->getInputAttributesForItems($field);
                $input_values = $this->getInputValuesForItems($field, $request);

                $view->getFactory()->startPush('scripts', view('custom-fields::partials.script', compact('field', 'input_values')));
                $input_values = null;
            } else {
                $input_attributes = $this->getInputAttributes($field);
                $input_values = $this->getInputValues($field, $request);
            }

            $section = $this->getSection($view, $field);

            $view->getFactory()->startPush($section, view('custom-fields::field', compact('field', 'input_type', 'input_attributes', 'input_col', 'input_options', 'input_values')));
        }
    }
}
