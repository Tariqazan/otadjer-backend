<?php

namespace Modules\SalesPurchaseOrders\Database\Seeds;

use App\Abstracts\Model;
use App\Traits\Permissions as Helper;
use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    use Helper;

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
            'admin'    => [
                'sales-purchase-orders-sales-orders'             => 'c,r,u,d',
                'sales-purchase-orders-purchase-orders'          => 'c,r,u,d',
                'sales-purchase-orders-settings-sales-order'    => 'r,u',
                'sales-purchase-orders-settings-purchase-order' => 'r,u',
            ],
            'manager'  => [
                'sales-purchase-orders-sales-orders'    => 'c,r,u,d',
                'sales-purchase-orders-purchase-orders' => 'c,r,u,d',
            ],
            'customer' => [
                'sales-purchase-orders-sales-orders'    => 'r,u',
                'sales-purchase-orders-purchase-orders' => 'r,u',
            ],
        ];

        $this->attachPermissionsByRoleNames($rows);
    }
}
