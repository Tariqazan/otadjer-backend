<?php

namespace Modules\SalesPurchaseOrders\Database\Seeds;

use App\Abstracts\Model;
use Illuminate\Database\Seeder;

class Settings extends Seeder
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
        setting()->set(
            [
                'sales-purchase-orders.sales_order.title' => trans_choice('sales-purchase-orders::general.sales_orders', 1),
                'sales-purchase-orders.purchase_order.title' => trans_choice('sales-purchase-orders::general.purchase_orders', 1),
            ]
        );

        setting()->save();
    }
}
