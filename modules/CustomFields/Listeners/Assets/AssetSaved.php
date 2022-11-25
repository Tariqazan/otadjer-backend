<?php

namespace Modules\CustomFields\Listeners\Assets;

use Modules\Assets\Models\Asset;
use Modules\CustomFields\Models\FieldValue;
use Modules\CustomFields\Traits\CustomFields;

class AssetSaved
{
    use CustomFields;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Asset $asset)
    {
        $custom_fields = $this->getFieldsByLocation('assets.assets');

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
                    'model_id' => $asset->id,
                    'model_type' => get_class($asset),
                ],
                [
                    'value' => $value,
                ]
            );
        }
    }
}
