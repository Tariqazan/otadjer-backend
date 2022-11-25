<?php

namespace Modules\CustomFields\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use Date;
use Illuminate\Support\Facades\DB;

class Version2112 extends Listener
{
    const ALIAS = 'custom-fields';

    const VERSION = '2.1.12';

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
            ['name' => 'assets::general.assets', 'code' => 'assets.assets', 'created_at' => Date::now(), 'updated_at' => Date::now()],
        ]);
    }
}
