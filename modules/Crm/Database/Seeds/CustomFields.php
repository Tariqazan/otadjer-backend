<?php

namespace Modules\Crm\Database\Seeds;

use App\Abstracts\Model;
use App\Models\Module\Module;
use Illuminate\Database\Seeder;
use Modules\CustomFields\Models\Location;

class CustomFields extends Seeder
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
        if (null === Module::alias('custom-fields')->enabled()->first()) {
            return;
        }

        Location::firstOrCreate(['name' => 'CRM Contacts', 'code' => 'crm.contacts']);
        Location::firstOrCreate(['name' => 'CRM Companies', 'code' => 'crm.companies']);
    }
}
