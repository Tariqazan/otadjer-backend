<?php

namespace Modules\Inventory\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\Report;
use App\Traits\Jobs;
use App\Jobs\Common\CreateReport;
use Illuminate\Database\Seeder;

class Reports extends Seeder
{
    use jobs;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->create();

        Model::reguard();
    }

    private function create()
    {
        $company_id = $this->command->argument('company');

        $rows = [
            [
                'company_id' => $company_id,
                'class' => 'App\Reports\IncomeSummary',
                'name' => trans('inventory::general.reports.name.income_summary'),
                'description' => trans('inventory::general.reports.description.income_summary'),
                'settings' => ['group' => 'item', 'period' => 'monthly', 'basis' => 'accrual', 'chart' => 'line'],
            ],
            [
                'company_id' => $company_id,
                'class' => 'App\Reports\ExpenseSummary',
                'name' => trans('inventory::general.reports.name.expense_summary'),
                'description' => trans('inventory::general.reports.description.expense_summary'),
                'settings' => ['group' => 'item', 'period' => 'monthly', 'basis' => 'accrual', 'chart' => 'line'],
            ],
            [
                'company_id' => $company_id,
                'class' => 'App\Reports\IncomeExpenseSummary',
                'name' => trans('inventory::general.reports.name.income_expense'),
                'description' => trans('inventory::general.reports.description.income_expense'),
                'settings' => ['group' => 'item', 'period' => 'monthly', 'basis' => 'accrual', 'chart' => 'line'],
            ],
            [
                'company_id' => $company_id,
                'class' => 'App\Reports\ProfitLoss',
                'name' => trans('inventory::general.reports.name.profit_loss'),
                'description' => trans('inventory::general.reports.description.profit_loss'),
                'settings' => ['group' => 'item', 'period' => 'quarterly', 'basis' => 'accrual'],
            ],
            [
                'company_id' => $company_id,
                'class' => 'Modules\Inventory\Reports\Item',
                'name' => trans('inventory::general.reports.name.stock_status'),
                'description' => trans('inventory::general.reports.description.stock_status'),
                'settings' => ['period' => 'monthly', 'chart' => 'line'],

            ],
            [
                'company_id' => $company_id,
                'class' => 'Modules\Inventory\Reports\SaleItem',
                'name' => trans('inventory::general.reports.name.sale_summary'),
                'description' => trans('inventory::general.reports.description.sale_summary'),
                'settings' => ['period' => 'monthly', 'chart' => 'line'],
            ],
            [
                'company_id' => $company_id,
                'class' => 'Modules\Inventory\Reports\PurchaseItem',
                'name' => trans('inventory::general.reports.name.purchase_summary'),
                'description' => trans('inventory::general.reports.description.purchase_summary'),
                'settings' => ['period' => 'monthly', 'chart' => 'line'],
            ],
            [
                'company_id' => $company_id,
                'class' => 'Modules\Inventory\Reports\ItemSummary',
                'name' => trans('inventory::general.reports.name.item_summary'),
                'description' => trans('inventory::general.reports.description.item_summary'),
                'settings' => [],
            ]
        ];

        foreach ($rows as $row) {
            $row['created_from'] = 'inventory::seed';

            $this->dispatch(new CreateReport($row));
        }
    }
}
