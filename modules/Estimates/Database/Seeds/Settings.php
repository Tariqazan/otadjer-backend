<?php

namespace Modules\Estimates\Database\Seeds;

use App\Abstracts\Model;
use Illuminate\Database\Seeder;

class Settings extends Seeder
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
        setting()->set(
            [
                'estimates.estimate.name'           => trans_choice('estimates::general.estimates', 2),
                'estimates.estimate.title' => trans_choice('estimates::general.estimates', 1),
            ]
        );

        setting()->save();
    }
}
