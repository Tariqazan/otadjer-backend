<?php

namespace Modules\SalesPurchaseOrders\Listeners\Document;

use App\Jobs\Document\CreateDocumentHistory;
use App\Traits\Jobs;
use Illuminate\Support\Str;
use Modules\SalesPurchaseOrders\Events\Issued as Event;

class MarkIssued
{
    use Jobs;

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(Event $event)
    {
        $event->document->status = 'issued';
        $event->document->save();

        $type = Str::replaceFirst('-', '_', Str::plural($event->document->type));

        $this->dispatch(
            new CreateDocumentHistory(
                $event->document,
                0,
                trans(
                    'documents.messages.marked_as',
                    [
                        'type' => trans_choice("sales-purchase-orders::general.$type", 1),
                        'status' => Str::lower(trans("sales-purchase-orders::{$type}.statuses.issued"))
                    ]
                )
            )
        );
    }
}
