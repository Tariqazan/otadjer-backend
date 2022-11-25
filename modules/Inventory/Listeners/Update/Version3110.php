<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Interfaces\Listener\ShouldUpdateAllCompanies;
use Illuminate\Support\Facades\File;

class Version3110 extends Listener implements ShouldUpdateAllCompanies
{
    const ALIAS = 'inventory';

    const VERSION = '3.1.10';

    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle(UpdateFinished $event)
    {
        if ($this->skipThisUpdate($event)) {
            return;
        }

        setting()->set('inventory.barcode_print_template', 'single');
        setting()->save();

        File::delete(base_path('modules/Inventory/Resources/view/partials/item/print_barcode.blade.php'));
    }
}
