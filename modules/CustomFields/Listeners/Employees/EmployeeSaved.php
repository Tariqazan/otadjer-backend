<?php

namespace Modules\CustomFields\Listeners\Employees;

use Modules\Employees\Models\Employee;
use Modules\CustomFields\Models\FieldValue;
use Modules\CustomFields\Traits\CustomFields;

class EmployeeSaved
{
    use CustomFields;
    
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Employee $employee)
    {
        $custom_fields = $this->getFieldsByLocation('employees.employees');

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
                    'model_id' => $employee->id,
                    'model_type' => get_class($employee),
                ],
                [
                    'value' => $value,
                ]
            );
        }
    }
}
