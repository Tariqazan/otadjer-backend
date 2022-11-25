<?php

namespace Modules\CustomFields\Listeners\Export;

use Modules\CustomFields\Traits\CustomFields;

class AppendHeadings
{
    use CustomFields;

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $fields = $this->getExportableFields($event);

        if ($fields->isEmpty()) {
            return;
        }

        $event->class->fields = array_merge($event->class->fields, $fields->pluck('code')->toArray());
    }
}
