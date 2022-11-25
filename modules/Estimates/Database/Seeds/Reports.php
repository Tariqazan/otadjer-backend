<?php

namespace Modules\Estimates\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Common\Report;
use Illuminate\Database\Seeder;

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
                'class' => 'Modules\Estimates\Reports\EstimateSummary',
                'name' => trans_choice('estimates::general.estimates', 2),
                'description' => trans('estimates::general.description'),
                'settings' => ['group' => 'category', 'period' => 'monthly', 'basis' => 'accrual', 'chart' => 'line'],
            ],
        ];

        foreach ($rows as $row) {
            Report::create($row);
        }
    }
}
