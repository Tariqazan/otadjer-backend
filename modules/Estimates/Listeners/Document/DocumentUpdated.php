<?php

namespace Modules\Estimates\Listeners\Document;

use App\Events\Document\DocumentUpdated as Event;
use App\Traits\Jobs;
use Modules\Estimates\Jobs\UpdateEstimateExtraParameter;
use Modules\Estimates\Models\Estimate;

class DocumentUpdated
{
    use Jobs;

    public function handle(Event $event): void
    {
        if ($event->document->type !== Estimate::TYPE) {
            return;
        }

        $this->dispatch(new UpdateEstimateExtraParameter($event->document, $event->request));
    }
}
