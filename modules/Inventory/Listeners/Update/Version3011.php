<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class Version3011 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '3.0.11';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        Artisan::call('module:migrate', ['alias' => self::ALIAS, '--force' => true]);
    }
}
