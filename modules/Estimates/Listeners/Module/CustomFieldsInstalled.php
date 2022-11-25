<?php

namespace Modules\Estimates\Listeners\Module;

use App\Events\Module\Installed as Event;
use Artisan;
use Modules\Estimates\Database\Seeds\CustomFields;

class CustomFieldsInstalled
{
    /**
     * Handle the event.
     *
     * @param Event $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        if ('custom-fields' !== $event->alias) {
            return;
        }

        $this->callSeeds();
    }

    protected function callSeeds()
    {
        Artisan::call(
            'company:seed',
            [
                'company' => company_id(),
                '--class' => CustomFields::class,
            ]
        );
    }
}
