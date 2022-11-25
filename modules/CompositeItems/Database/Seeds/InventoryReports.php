<?php

namespace Modules\CompositeItems\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\Report;
use Illuminate\Database\Seeder;

class InventoryReports extends Seeder
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
                'class' => 'Modules\CompositeItems\Reports\InvoiceAmount',
                'name' => trans('composite-items::general.reports.name.invoice_amount'),
                'description' => trans('composite-items::general.reports.description.invoice_amount'),
                'settings' => ['period' => 'monthly', 'chart' => 'line'],

            ],
        ];

        foreach ($rows as $row) {
            Report::create($row);
        }
    }
}
