<?php

namespace Modules\Estimates\Listeners\Document;

use App\Events\Document\DocumentCreated as Event;
use App\Traits\Jobs;
use Modules\Estimates\Jobs\CreateEstimateExtraParameter;
use Modules\Estimates\Models\Estimate;

class DocumentCreated
{
    use Jobs;

    public function handle(Event $event): void
    {
        if ($event->document->type !== Estimate::TYPE) {
            return;
        }

        if (false === $event->request->get('expire_at', false)) {
            return;
        }

        $this->dispatch(new CreateEstimateExtraParameter($event->document, $event->request));
    }
}
