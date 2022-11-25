<?php

namespace Modules\SalesPurchaseOrders\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\Report;
use Illuminate\Database\Seeder;
use Modules\SalesPurchaseOrders\Reports\PurchaseOrderSummary;
use Modules\SalesPurchaseOrders\Reports\SalesOrderSummary;

class Reports extends Seeder
{
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
                 'class' => SalesOrderSummary::class,
                 'name' => trans_choice('sales-purchase-orders::general.sales_orders', 2),
                 'description' => trans('sales-purchase-orders::sales_orders.summary_report_description'),
                 'settings' => ['group' => 'customer', 'period' => 'monthly', 'basis' => 'accrual', 'chart' => 'line'],
            ],
             [
                 'company_id' => $company_id,
                 'class' => PurchaseOrderSummary::class,
                 'name' => trans_choice('sales-purchase-orders::general.purchase_orders', 2),
                 'description' => trans('sales-purchase-orders::purchase_orders.summary_report_description'),
                 'settings' => ['group' => 'vendor', 'period' => 'monthly', 'basis' => 'accrual', 'chart' => 'line'],
            ],
        ];

        foreach ($rows as $row) {
            Report::create($row);
        }
    }
}
