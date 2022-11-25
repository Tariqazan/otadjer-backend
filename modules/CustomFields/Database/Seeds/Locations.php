<?php

namespace Modules\CustomFields\Database\Seeds;

use App\Abstracts\Model;
use Illuminate\Database\Seeder;
use Modules\CustomFields\Models\Location;

class Locations extends Seeder
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
        $rows = [
            [
                'name' => 'general.companies',
                'code' => 'common.companies',
            ],
            [
                'name' => 'general.items',
                'code' => 'common.items',
            ],
            [
                'name' => 'general.invoices',
                'code' => 'sales.invoices',
            ],
            [
                'name' => 'general.revenues',
                'code' => 'sales.revenues',
            ],
            [
                'name' => 'general.customers',
                'code' => 'sales.customers',
            ],
            [
                'name' => 'general.bills',
                'code' => 'purchases.bills',
            ],
            [
                'name' => 'general.payments',
                'code' => 'purchases.payments',
            ],
            [
                'name' => 'general.vendors',
                'code' => 'purchases.vendors',
            ],
            [
                'name' => 'general.accounts',
                'code' => 'banking.accounts',
            ],
            [
                'name' => 'general.transfers',
                'code' => 'banking.transfers',
            ],
            [
                'name' => 'employees::general.employees',
                'code' => 'employees.employees',
            ],
            [
                'name' => 'employees::general.positions',
                'code' => 'employees.positions',
            ],
            [
                'name' => 'assets::general.assets',
                'code' => 'assets.assets',
            ],
            [
                'name' => 'expenses::general.expense_claims',
                'code' => 'expenses.expense-claims',
            ],
        ];

        foreach ($rows as $row) {
            Location::firstOrCreate($row);
        }
    }
}
