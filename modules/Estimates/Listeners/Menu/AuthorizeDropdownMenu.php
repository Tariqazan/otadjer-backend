<?php

namespace Modules\Estimates\Listeners\Menu;

use App\Events\Menu\ItemAuthorizing as Event;
use App\Traits\Modules;

class AuthorizeDropdownMenu
{
    use Modules;

    public function handle(Event $event)
    {
        if (false === $this->moduleIsEnabled('estimates')) {
            return;
        }

        $sales = trim(trans_choice('general.sales', 2));

        if ($event->item->title !== trim(trans_choice('general.sales', 2))) {
            return;
        }

        // Sales -> Estimates
        if ($event->item->title === $sales) {
            $event->item->permissions[] = 'read-estimates-estimates';
        }
    }
}
