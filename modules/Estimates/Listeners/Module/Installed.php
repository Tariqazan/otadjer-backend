<?php

namespace Modules\Estimates\Listeners\Module;

use App\Events\Module\Installed as Event;
use Artisan;
use Modules\Estimates\Database\Seeds\Install;

class Installed
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
        if ('estimates' !== $event->alias) {
            return;
        }

        $this->callSeeds();
        $this->publishAssets();
    }

    protected function callSeeds()
    {
        Artisan::call(
            'company:seed',
            [
                'company' => company_id(),
                '--class' => Install::class,
            ]
        );
    }

    protected function publishAssets()
    {
        Artisan::call('vendor:publish', ['--tag' => 'public', '--force' => true]);
    }
}
