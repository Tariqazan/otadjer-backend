<?php

namespace Modules\Estimates\Listeners\Menu;

use App\Events\Menu\AdminCreated as Event;
use App\Traits\Modules;

class Admin
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

        if (!$user->can(['read-estimates-estimates'])) {
            return;
        }

        $salesMenu = $event->menu->findBy('title', trim(trans_choice('general.sales', 2)));


        $salesMenu->child(
            [
                'route'   => ['estimates.estimates.index', []],
                'title' => setting('estimates.estimate.name', trans_choice('estimates::general.estimates', 2)),
                'order' => 5,
            ]
        );
    }
}
