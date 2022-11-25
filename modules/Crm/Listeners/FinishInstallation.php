<?php

namespace Modules\Crm\Listeners;

use App\Events\Module\Installed as Event;
use App\Traits\Contacts;
use Artisan;

class FinishInstallation
{
    use Contacts;

    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if ($event->alias != 'crm') {
            return;
        }

        $this->callSeeds();
    }

    protected function callSeeds()
    {
        Artisan::call('company:seed', [
            'company' => company_id(),
            '--class' => 'Modules\Crm\Database\Seeds\Install',
        ]);
    }
}
