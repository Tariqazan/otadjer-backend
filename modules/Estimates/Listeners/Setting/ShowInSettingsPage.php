<?php

namespace Modules\Estimates\Listeners\Setting;

use App\Events\Module\SettingShowing as Event;

class ShowInSettingsPage
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
        $event->modules->settings['estimates'] = [
            'name'        => trans_choice('estimates::general.estimates', 1),
            'description' => trans('estimates::general.description'),
            'url'         => route('estimates.settings.estimate.edit'),
            'permission'  => 'read-estimates-settings-estimate',
            'icon'        => 'fa fa-check',
        ];
    }
}
