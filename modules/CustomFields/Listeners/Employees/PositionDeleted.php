<?php

namespace Modules\CustomFields\Listeners\Employees;

use Modules\CustomFields\Models\FieldValue;
use Modules\Employees\Models\Position;

class PositionDeleted
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Position $position)
    {
        FieldValue::record($position->id, get_class($position))->delete();
    }
}
