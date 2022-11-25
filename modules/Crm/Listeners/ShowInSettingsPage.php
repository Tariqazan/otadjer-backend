<?php

namespace Modules\Crm\Listeners;

use App\Events\Module\SettingShowing as Event;
use App\Models\Module\Module;

class ShowInSettingsPage
{
    /**
     * Handle the event.
     *
     * @param  Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        $enabled = Module::alias('crm')->enabled()->first();

        if (!$enabled) {
            return;
        }
        
        $event->modules->settings['crm'] = [
            'name' => trans('crm::general.name'),
            'description' => trans('crm::general.description'),
            'url' => route('crm.setting.edit'),
            'icon' => 'fa fa-handshake',
        ];
    }
}
