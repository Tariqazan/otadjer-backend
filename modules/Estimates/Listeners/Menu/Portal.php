<?php

namespace Modules\Estimates\Listeners\Menu;

use App\Events\Menu\PortalCreated as Event;
use App\Traits\Modules;

class Portal
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param Event $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        if (false === $this->moduleIsEnabled('estimates')) {
            return;
        }

        $user = auth()->user();

        if (!$user->can(['read-estimates-portal-estimates'])) {
            return;
        }

        $event->menu->route(
            'portal.estimates.estimates.index',
            setting('estimates.estimate.name', trans_choice('estimates::general.estimates', 2)),
            [],
            15,
            ['icon' => 'fa fa-check']
        );
    }
}
