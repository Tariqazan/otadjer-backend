<?php

namespace Modules\WarehouseRoleManagement\Database\Seeds;

use App\Abstracts\Model;
use App\Traits\Permissions as Helper;
use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    use Helper;

    public $alias = 'warehouse-role-management';

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
        $this->attachPermissionsByRoleNames([
            'admin' => [
                $this->alias => 'c,r,u,d',
            ],
        ]);    
    }
}
