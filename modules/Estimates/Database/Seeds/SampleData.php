<?php

namespace Modules\Estimates\Database\Seeds;

use App\Abstracts\Model;
use Illuminate\Database\Seeder;
use Modules\Estimates\Models\Estimate;

class SampleData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();

        $count = (int)$this->command->option('count');

        Estimate::factory($count)->estimate()->create();

        Model::unguard();
    }
}
