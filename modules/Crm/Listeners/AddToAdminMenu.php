<?php

namespace Modules\Crm\Listeners;

use Auth;
use App\Events\Menu\AdminCreated as Event;
use App\Models\Module\Module;

class AddToAdminMenu
{
    /**
     * Handle the event.
     *
     * @param Event $event
     * @return void
     */
    public function handle(Event $event)
    {
        $enabled = Module::alias('crm')->enabled()->first();

        if (!$enabled) {
            return;
        }

        $user = Auth::user();

        if (!$user->can([
            'read-crm-activities',
            'read-crm-companies',
            'read-crm-contacts',
            'read-crm-deals',
            'read-crm-schedules',
        ])) {
            return;
        }

        $attr = [];

        $event->menu->dropdown(trans('crm::general.name'), function ($sub) use ($user, $attr) {
            if ($user->can('read-crm-contacts')) {
                $sub->route('crm.contacts.index',  trans_choice('crm::general.contacts', 2), [], 10, $attr);
            }

            if ($user->can('read-crm-companies')) {
                $sub->route('crm.companies.index', trans_choice('crm::general.companies', 2), [], 20, $attr);
            }

            if ($user->can('read-crm-deals')) {
                $sub->route('crm.deals.index', trans_choice('crm::general.deals', 2), [], 30, $attr);
            }

            if ($user->can('read-crm-activities')) {
                $sub->route('crm.activities.index', trans_choice('crm::general.activities', 2), [], 40, $attr);
            }

            if ($user->can('read-crm-schedules')) {
                $sub->route('crm.schedules.index', trans_choice('crm::general.schedule', 2), [], 50, $attr);
            }
        }, 21, [
            'title' => trans('crm::general.name'),
            'icon' => 'fa fa-handshake',
        ]);
    }
}
