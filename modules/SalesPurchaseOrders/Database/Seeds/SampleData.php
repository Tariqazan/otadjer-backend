<?php

namespace Modules\SalesPurchaseOrders\Database\Seeds;

use App\Abstracts\Model;
use Illuminate\Database\Seeder;
use Modules\SalesPurchaseOrders\Models\PurchaseOrder\Model as PurchaseOrder;
use Modules\SalesPurchaseOrders\Models\SalesOrder\Model as SalesOrder;

class SampleData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();

        $count = (int)$this->command->option('count');

        SalesOrder::factory($count)->sales()->create();
        PurchaseOrder::factory($count)->purchase()->create();

        Model::unguard();
    }
}
