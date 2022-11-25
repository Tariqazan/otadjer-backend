<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Report;
use App\Interfaces\Listener\ShouldUpdateAllCompanies;
use App\Traits\Permissions;

class Version314 extends Listener implements ShouldUpdateAllCompanies
{
    use Permissions;

    const ALIAS = 'inventory';

    const VERSION = '3.1.4';

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

        setting()->set('inventory.reorder_level_notification', 0);
        setting()->save();

        Report::create([
            'company_id' => company_id(),
            'class' => 'Modules\Inventory\Reports\ItemSummary',
            'name' => trans('inventory::general.reports.name.item_summary'),
            'description' => trans('inventory::general.reports.description.item_summary'),
            'settings' => [],
        ]);

        $this->attachPermissionsToAdminRoles(['inventory-reports-item-summary' => 'r']);
    }
}