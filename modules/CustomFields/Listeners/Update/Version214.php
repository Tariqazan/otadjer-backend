<?php

namespace Modules\CustomFields\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\Artisan;

class Version214 extends Listener
{
    const ALIAS = 'custom-fields';

    const VERSION = '2.1.4';

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

        $this->updateDatabase();
    }

    public function updateDatabase()
    {
        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }
}
