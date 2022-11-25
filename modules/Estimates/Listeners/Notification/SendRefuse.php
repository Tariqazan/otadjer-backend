<?php

namespace Modules\Estimates\Listeners\Notification;

use Modules\Estimates\Notifications\Estimate as Notification;
use Modules\Estimates\Events\Refused as Event;

class SendRefuse
{
    /**
     * Handle the event.
     *
     * @param  $event
     * @return array
     */
    public function handle(Event $event)
    {
        $estimate = $event->estimate;

        // Notify all users assigned to this company
        foreach ($estimate->company->users as $user) {
            if (!$user->can('read-notifications')) {
                continue;
            }

            $user->notify(new Notification($estimate, 'estimate_refused_admin'));
        }
    }
}
