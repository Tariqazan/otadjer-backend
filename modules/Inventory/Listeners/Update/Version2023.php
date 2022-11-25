<?php

namespace Modules\Inventory\Listeners\Update;

use App\Abstracts\Listeners\Update as Listener;
use App\Events\Install\UpdateFinished;
use App\Models\Common\Report;

class Version2023 extends Listener
{
    const ALIAS = 'inventory';

    const VERSION = '2.0.23';

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
                'class' => 'Modules\Inventory\Reports\SaleItem',
                'name' => trans('inventory::general.reports.name.sale_summary'),
                'description' => trans('inventory::general.reports.description.sale_summary'),
                'settings' => ['period' => 'monthly','chart' => 'line'],
            ],
            [
                'company_id' => $company_id,
                'class' => 'Modules\Inventory\Reports\PurchaseItem',
                'name' => trans('inventory::general.reports.name.purchase_summary'),
                'description' => trans('inventory::general.reports.description.purchase_summary'),
                'settings' => ['period' => 'monthly','chart' => 'line'],
            ],
            // [
            //     'company_id' => $company_id,
            //     'class' => 'Modules\Inventory\Reports\ExpectedStockIncome',
            //     'name' => trans('inventory::general.reports.name.income_status'),
            //     'description' => trans('inventory::general.reports.description.income_status'),
            //     'settings' => [],
            // ],
        ];

        foreach ($rows as $row) {
            Report::create($row);
        }
    }
}
