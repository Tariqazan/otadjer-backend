<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class Version208 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '2.0.8';

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

        Artisan::call('company:seed', [
            'company' => company_id(),
            '--class' => 'Modules\Inventory\Database\Seeds\Reports',
        ]);
    }
}
