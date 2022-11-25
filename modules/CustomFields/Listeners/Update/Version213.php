<?php

namespace Modules\CustomFields\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use Date;
use Illuminate\Support\Facades\DB;

class Version213 extends Listener
{
    const ALIAS = 'custom-fields';

    const VERSION = '2.1.3';

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
        DB::table('custom_fields_locations')->insert([
            ['name' => 'Employees', 'code' => 'employees.employees', 'created_at' => Date::now(), 'updated_at' => Date::now()],
            ['name' => 'Positions', 'code' => 'employees.positions', 'created_at' => Date::now(), 'updated_at' => Date::now()],
        ]);
    }
}
