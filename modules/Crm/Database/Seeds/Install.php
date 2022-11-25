<?php

namespace Modules\Crm\Database\Seeds;

use Illuminate\Database\Seeder;

class Install extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Contacts::class);
        $this->call(CustomFields::class);
        $this->call(Dashboards::class);
        $this->call(Pipelines::class);
        $this->call(Permissions::class);
        $this->call(Reports::class);
    }
}
