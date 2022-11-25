<?php

namespace Modules\CompositeItems\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\Report;
use Illuminate\Database\Seeder;

class CoreReports extends Seeder
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
                'class' => 'Modules\CompositeItems\Reports\SaleSummary',
                'name' => trans('composite-items::general.reports.name.sale_summary'),
                'description' => trans('composite-items::general.reports.description.sale_summary'),
                'settings' => ['period' => 'monthly'],
            ],
        ];

        foreach ($rows as $row) {
            Report::create($row);
        }
    }
}
