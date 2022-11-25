<?php

namespace Modules\CustomFields\Listeners\Assets;

use Modules\Assets\Models\Asset;
use Modules\CustomFields\Models\FieldValue;

class AssetDeleted
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Asset $asset)
    {
        FieldValue::record($asset->id, get_class($asset))->delete();
    }
}
