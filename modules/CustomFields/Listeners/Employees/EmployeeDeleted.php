<?php

namespace Modules\CustomFields\Listeners\Employees;

use Modules\CustomFields\Models\FieldValue;
use Modules\Employees\Models\Employee;

class EmployeeDeleted
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Employee $employee)
    {
        FieldValue::record($employee->id, get_class($employee))->delete();
    }
}
