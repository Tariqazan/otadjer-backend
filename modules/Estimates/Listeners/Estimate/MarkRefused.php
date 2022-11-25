<?php

namespace Modules\Estimates\Listeners\Estimate;

use App\Jobs\Document\CreateDocumentHistory;
use App\Traits\Jobs;
use Illuminate\Support\Str;
use Modules\Estimates\Events\Refused as Event;

class MarkRefused
{
    use Jobs;

    /**
     * Handle the event.
     *
     * @param  $event
     *
     * @return void
     */
    public function handle(Event $event)
    {
        // Mark estimate as refused
        $event->estimate->status = 'refused';

        $event->estimate->save();

        $this->dispatch(
            new CreateDocumentHistory(
                $event->estimate,
                0,
                trans(
                    'documents.messages.marked_as',
                    [
                        'type'   => trans_choice('estimates::general.estimates', 1),
                        'status' => Str::lower(trans('documents.statuses.refused')),
                    ]
                )
            )
        );
    }
}
