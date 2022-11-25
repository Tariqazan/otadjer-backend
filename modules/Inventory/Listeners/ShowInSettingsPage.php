<?php

namespace Modules\Inventory\Listeners;

use App\Events\Module\SettingShowing as Event;
use App\Traits\Modules;

class ShowInSettingsPage
{
    use Modules;

    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        if (!$this->moduleIsEnabled('inventory')) {
            return;
        }

        $event->modules->settings['inventory'] = [
            'name' => trans('inventory::general.name'),
            'description' => trans('inventory::general.description'),
            'url' => route('inventory.settings.edit'),
            'icon' => 'fa fa-cubes',
        ];
    }
}
