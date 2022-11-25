<?php

namespace Modules\CustomFields\Listeners;

use Modules\CustomFields\Models\FieldValue;

class CloneField
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($clone, $original)
    {
        $clone_field_value = FieldValue::record($clone->id, get_class($clone))->first();

        if (!$clone_field_value) {
            return;
        }

        $original_field_value = FieldValue::record($original->id, get_class($original))->first();

        if ($clone_field_value->type_id != $original_field_value->type_id) {
            return;
        }
        
        $clone_field_value->value = $original_field_value->value;
        $clone_field_value->save();
    }
}
