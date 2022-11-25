<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Report;

class Version2018 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '2.0.18';

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

        $company_id = company_id();

        $rows = [
            [
                'company_id' => $company_id,
                'class' => 'Modules\Inventory\Reports\Item',
                'name' => trans('inventory::general.reports.name.stock_status'),
                'description' =>  trans('inventory::general.reports.description.stock_status'),
                'settings' => ['period' => 'quarterly','chart' => 'line'],
            ],
        ];

        foreach ($rows as $row) {
            Report::create($row);
        }
    }
}
