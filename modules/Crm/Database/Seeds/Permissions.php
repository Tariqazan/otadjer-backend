<?php

namespace Modules\Crm\Database\Seeds;

use App\Abstracts\Model;
use App\Traits\Permissions as Helper;
use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    use Helper;

    public $alias = 'crm';

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
            $this->alias . '-activities' => 'r',
            $this->alias . '-companies' => 'c,r,u,d',
            $this->alias . '-contacts' => 'c,r,u,d',
            $this->alias . '-deals' => 'c,r,u,d',
            $this->alias . '-schedules' => 'r',
            $this->alias . '-positions' => 'c,r,u,d',
            $this->alias . '-settings' => 'r,u',
        ]);
    }
}
