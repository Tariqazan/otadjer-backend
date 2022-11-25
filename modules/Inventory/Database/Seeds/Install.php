<?php

namespace Modules\Inventory\Database\Seeds;

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
        $this->call(Permissions::class);
        $this->call(Warehouses::class);
        $this->call(Dashboards::class);
        $this->call(Settings::class);
        $this->call(Reports::class);
        $this->call(Sku::class);
    }
}
