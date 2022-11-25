<?php

namespace Modules\Crm\Listeners;

use App\Events\Module\Installed as Event;
use Artisan;

class CustomFieldsInstallation
{
    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if ($event->alias != 'custom-fields') {
            return;
        }

        $this->callSeeds();
    }

    protected function callSeeds()
    {
        Artisan::call('company:seed', [
            'company' => company_id(),
            '--class' => 'Modules\Crm\Database\Seeds\CustomFields',
        ]);
    }
}
