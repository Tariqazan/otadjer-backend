<?php

namespace Modules\CustomFields\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\DB;

class Version2110 extends Listener
{
    const ALIAS = 'custom-fields';

    const VERSION = '2.1.10';

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

        $this->updateLocations();
    }

    public function updateLocations()
    {
        $locations = [
            ['old' => 'Companies', 'new' => 'general.companies'],
            ['old' => 'Items', 'new' => 'general.items'],
            ['old' => 'Invoices', 'new' => 'general.invoices'],
            ['old' => 'Revenues', 'new' => 'general.revenues'],
            ['old' => 'Customers', 'new' => 'general.customers'],
            ['old' => 'Bills', 'new' => 'general.bills'],
            ['old' => 'Payments', 'new' => 'general.payments'],
            ['old' => 'Vendors', 'new' => 'general.vendors'],
            ['old' => 'Accounts', 'new' => 'general.accounts'],
            ['old' => 'Transfers', 'new' => 'general.transfers'],
            ['old' => 'Employees', 'new' => 'employees::general.employees'],
            ['old' => 'Positions', 'new' => 'employees::general.positions'],
            ['old' => 'Estimates', 'new' => 'estimates::general.estimates'],
        ];

        foreach ($locations as $location) {
            DB::table('custom_fields_locations')
                ->where('name', $location['old'])
                ->update(['name' => $location['new']]);
        }
    }
}
