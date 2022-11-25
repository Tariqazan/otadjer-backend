<?php

namespace Modules\Estimates\Database\Seeds;

use App\Abstracts\Model;
use App\Traits\Modules;
use Illuminate\Database\Seeder;
use Modules\CustomFields\Models\Location;

class CustomFields extends Seeder
{
    use Modules;

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
        if (false === $this->moduleIsEnabled('custom-fields')) {
            return;
        }

        Location::firstOrCreate(['name' => 'Estimates', 'code' => 'estimates::estimates']);
    }
}
