<?php

namespace Modules\Inventory\Database\Seeds;

use App\Traits\Jobs;
use App\Abstracts\Model;
use Illuminate\Database\Seeder;

class Settings extends Seeder
{
    use jobs;

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
        setting()->set('inventory.units', json_encode((object) trans('inventory::items.unit')));
        setting()->set('inventory.reasons', json_encode((object) trans('inventory::adjustments.reason')));
        setting()->set('inventory.barcode_type', 0);
        setting()->set('inventory.barcode_print_template', 'single');
        setting()->save();
    }
}
