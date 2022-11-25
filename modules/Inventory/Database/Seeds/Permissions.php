<?php

namespace Modules\Inventory\Database\Seeds;

use App\Abstracts\Model;
use App\Traits\Permissions as Helper;
use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    use Helper;

    public $alias = 'inventory';

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
        $this->attachPermissionsToAdminRoles([
            $this->alias . '-item-groups'       => 'c,r,u,d',
            $this->alias . '-items'             => 'c,r,u,d',
            $this->alias . '-variants'          => 'c,r,u,d',
            $this->alias . '-manufacturers'     => 'c,r,u,d',
            $this->alias . '-transfer-orders'   => 'c,r,u,d',
            $this->alias . '-adjustments'       => 'c,r,u,d',
            $this->alias . '-warehouses'        => 'c,r,u,d',
            $this->alias . '-histories'         => 'c,r,u,d',
            $this->alias . '-reports'           => 'c,r,u,d',
            $this->alias . '-settings'          => 'r,u',
        ]);
    }
}
