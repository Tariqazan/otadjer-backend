<?php

namespace Modules\Estimates\Database\Seeds;

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
                'estimates-estimates'         => 'c,r,u,d',
                'estimates-settings-estimate' => 'r,u',
            ],
            'manager'  => [
                'estimates-estimates' => 'c,r,u,d',
            ],
            'customer' => [
                'estimates-portal-estimates' => 'r,u',
            ],
        ];

        $this->attachPermissionsByRoleNames($rows);
    }
}
