<?php

namespace Modules\WarehouseRoleManagement\Listeners;

use App\Events\Module\Installed as Event;
use Artisan;

class FinishInstallation
{
    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if ($event->alias != 'warehouse-role-management') {
            return;
        }

        $this->callSeeds();
    }

    protected function callSeeds()
    {
        Artisan::call('company:seed', [
            'company' => company_id(),
            '--class' => 'Modules\WarehouseRoleManagement\Database\Seeds\Install',
        ]);
    }
}
