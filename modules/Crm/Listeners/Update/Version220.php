<?php

namespace Modules\Crm\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Traits\Modules;
use Illuminate\Support\Facades\Artisan;

class Version220 extends Listener
{
    use Modules;

    const ALIAS = 'crm';

    const VERSION = '2.2.0';

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

        Artisan::call('migrate', ['--force' => true]);

        $this->callSeeds();
    }

    protected function callSeeds()
    {
        if (!$this->moduleIsEnabled('crm') || !$this->moduleIsEnabled('custom-fields')) {
            return;
        }

        Artisan::call('company:seed', [
            'company' => company_id(),
            '--class' => 'Modules\Crm\Database\Seeds\CustomFields',
        ]);
    }
}
