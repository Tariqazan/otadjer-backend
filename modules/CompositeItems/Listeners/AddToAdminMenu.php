<?php

namespace Modules\CompositeItems\Listeners;

use Auth;
use App\Events\Menu\AdminCreated as Event;
use App\Traits\Modules;

class AddToAdminMenu
{
    use Modules;
    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if (!$this->moduleIsEnabled('composite-items')) {
            return;
        }

        $user = Auth::user();

        if (!$user->can(['read-composite-items-composite-items'])) {
            return;
        }

        if (!$this->moduleIsEnabled('inventory')) {
            $event->menu->add([
                'url' => route('composite-items.composite-items.index'),
                'title' => trans('composite-items::general.name'),
                'icon' => 'far fa-calendar-alt',
                'order' => 21,
            ]);
        }
    }
}
