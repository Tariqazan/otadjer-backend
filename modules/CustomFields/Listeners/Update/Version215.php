<?php

namespace Modules\CustomFields\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Utilities\Date;
use Illuminate\Support\Facades\DB;

class Version215 extends Listener
{
    const ALIAS = 'custom-fields';

    const VERSION = '2.1.5';

    /**
     * Handle the event.
     *
     * @param  $event
     *
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        $this->updateTypes();

        $this->updateLocations();
    }

    public function updateTypes()
    {
        $names = [
            'select' => 'custom-fields::general.type.select',
            'radio' => 'custom-fields::general.type.enabled',
            'checkbox' => 'custom-fields::general.type.checkbox',
            'text' => 'custom-fields::general.type.text',
            'textarea' => 'custom-fields::general.type.textarea',
            'date' => 'custom-fields::general.type.date',
            'time' => 'custom-fields::general.type.time',
            'dateTime' => 'custom-fields::general.type.date&time',
        ];

        $types = DB::table('custom_fields_types')
            ->select('type')
            ->distinct()
            ->get();

        foreach ($types as $type) {
            if (!isset($names[$type->type])) {
                continue;
            }

            DB::table('custom_fields_types')
                ->where('type', $type->type)
                ->update(['name' => $names[$type->type]]);

            $id = DB::table('custom_fields_types')
                ->where('type', $type->type)
                ->orderBy('id')
                ->value('id');

            $_types = DB::table('custom_fields_types')
                ->where('type', '=', $type->type)
                ->where('id', '<>', $id)
                ->orderBy('id')
                ->get();

            foreach ($_types as $_type) {
                DB::table('custom_fields_fields')
                    ->where('type_id', $_type->id)
                    ->update(['type_id' => $id]);

                DB::table('custom_fields_field_values')
                    ->where('type_id', $_type->id)
                    ->update(['type_id' => $id]);

                DB::table('custom_fields_field_type_options')
                    ->where('type_id', $_type->id)
                    ->update(['type_id' => $id]);

                DB::table('custom_fields_types')
                    ->where('id', '=', $_type->id)
                    ->delete();
            }
        }
    }

    public function updateLocations()
    {
        $locations = [
            ['name' => 'Employees', 'code' => 'employees.employees'],
            ['name' => 'Positions', 'code' => 'employees.positions'],
        ];

        foreach ($locations as $location) {
            $total_records = DB::table('custom_fields_locations')
                ->where('code', '=', $location['code'])
                ->count();

            if ($total_records > 1) {
                $id = DB::table('custom_fields_locations')->insertGetId([
                    'name' => $location['name'],
                    'code' => $location['code'],
                    'created_at' => Date::now(),
                    'updated_at' => Date::now(),
                ]);

                $records = DB::table('custom_fields_locations')
                    ->where('code', '=', $location['code'])
                    ->where('id', '<>', $id)
                    ->get();

                foreach ($records as $record) {
                    DB::table('custom_fields_fields')
                        ->where('locations', $record->id)
                        ->update(['locations' => $id]);

                    DB::table('custom_fields_field_locations')
                        ->where('location_id', $record->id)
                        ->update(['location_id' => $id]);

                    DB::table('custom_fields_field_values')
                        ->where('location_id', $record->id)
                        ->update(['location_id' => $id]);
                }

                DB::table('custom_fields_locations')
                    ->where('code', '=', $location['code'])
                    ->where('id', '<>', $id)
                    ->delete();
            }
        }
    }
}
