<?php

namespace Modules\CustomFields\Listeners\Employees;

use Modules\CustomFields\Models\FieldValue;
use Modules\CustomFields\Traits\CustomFields;
use Modules\Employees\Models\Position;

class PositionSaved
{
    use CustomFields;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Position $position)
    {
        $custom_fields = $this->getFieldsByLocation('employees.positions');

        $request = request();

        foreach ($custom_fields as $custom_field) {
            $value = null;

            if (isset($request[$custom_field->code])) {
                $value = $request[$custom_field->code];
            }

            FieldValue::updateOrCreate(
                [
                    'company_id' => company_id(),
                    'field_id' => $custom_field->id,
                    'type_id' => $custom_field->type_id,
                    'type' => $custom_field->type->type,
                    'location_id' => $custom_field->locations,
                    'model_id' => $position->id,
                    'model_type' => get_class($position),
                ],
                [
                    'value' => $value,
                ]
            );
        }
    }
}
