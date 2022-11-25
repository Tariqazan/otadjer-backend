<?php

namespace Modules\CustomFields\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\DB;

class Version210 extends Listener
{
    const ALIAS = 'custom-fields';

    const VERSION = '2.1.0';

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

        $this->updateType();
        $this->updateLocations();
        $this->updateRadioToSelect();
    }

    public function updateType()
    {
        DB::table('custom_fields_types')
            ->where('type', 'date&time')
            ->update([
                'type' => 'dateTime',
            ]);
    }

    public function updateLocations()
    {
        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'contact_id_input_start')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'sales.invoices')
                    ->orWhere('code', 'purchases.bills');
            })
            ->update([
                'sort_order' => 'issued_at_input_start',
            ]);

        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'contact_id_input_end')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'sales.invoices')
                    ->orWhere('code', 'purchases.bills');
            })
            ->update([
                'sort_order' => 'issued_at_input_end',
            ]);

        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'currency_code_input_start')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'sales.invoices')
                    ->orWhere('code', 'purchases.bills');
            })
            ->update([
                'sort_order' => 'issued_at_input_start',
            ]);

        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'currency_code_input_end')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'sales.invoices')
                    ->orWhere('code', 'purchases.bills');
            })
            ->update([
                'sort_order' => 'issued_at_input_end',
            ]);

        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'domain_input_start')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'common.companies');
            })
            ->update([
                'sort_order' => 'locale_input_start',
            ]);

        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'domain_input_end')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'common.companies');
            })
            ->update([
                'sort_order' => 'locale_input_end',
            ]);

        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'tax_id_input_start')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'common.items');
            })
            ->update([
                'sort_order' => 'tax_ids_input_start',
            ]);

        DB::table('custom_fields_field_locations')
            ->where('sort_order', 'tax_id_input_end')
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'common.items');
            })
            ->update([
                'sort_order' => 'tax_ids_input_end',
            ]);

        DB::table('custom_fields_field_locations')
            ->whereIn('sort_order', [
                'action_td_input_start',
                'action_td_input_end',
                'name_td_input_start',
                'name_td_input_end',
                'quantity_td_input_start',
                'quantity_td_input_end',
                'price_td_input_start',
                'price_td_input_end',
                'taxes_td_input_start',
                'taxes_td_input_end',
                'total_td_input_start',
                'total_td_input_end',
            ])
            ->whereIn('location_id', function ($query) {
                $query->select('id')
                    ->from('custom_fields_locations')
                    ->where('code', 'sales.invoices')
                    ->orWhere('code', 'purchases.bills');
            })
            ->update([
                'sort_order' => 'item_custom_fields',
            ]);
    }

    public function updateRadioToSelect()
    {
        $radio_type_id = DB::table('custom_fields_types')
            ->where('type', 'radio')
            ->value('id');

        $select_type_id = DB::table('custom_fields_types')
            ->where('type', 'select')
            ->value('id');

        DB::table('custom_fields_fields')
            ->where('type_id', $radio_type_id)
            ->update([
                'type_id' => $select_type_id,
            ]);

        DB::table('custom_fields_field_type_options')
            ->where('type_id', $radio_type_id)
            ->update([
                'type_id' => $select_type_id,
            ]);

        DB::table('custom_fields_field_values')
            ->where('type_id', $radio_type_id)
            ->update([
                'type_id' => $select_type_id,
                'type' => 'select',
            ]);
    }
}
