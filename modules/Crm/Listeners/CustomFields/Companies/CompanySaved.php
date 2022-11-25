<?php

namespace Modules\Crm\Listeners\CustomFields\Companies;

use App\Traits\Modules;
use Modules\Crm\Models\Company;
use Modules\CustomFields\Models\FieldValue;
use Modules\CustomFields\Models\Field;
use Modules\CustomFields\Models\Location;

class CompanySaved
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Company $company)
    {
        if (!$this->moduleIsEnabled('crm') || !$this->moduleIsEnabled('custom-fields')) {
            return;
        }

        $custom_fields = $this->getFieldsByLocation('crm.companies');

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
                    'model_id' => $company->id,
                    'model_type' => get_class($company),
                ],
                [
                    'value' => $value,
                ]
            );
        }
    }

    public function getFieldsByLocation($code)
    {
        $location = Location::code($code)->first();

        if (is_null($location)) {
            return collect([]);
        }

        return Field::enabled()->orderBy('name')->byLocation($location->id)->get();
    }
}
