<?php

namespace Modules\CustomFields\Database\Seeds;

use App\Abstracts\Model;
use Illuminate\Database\Seeder;
use Modules\CustomFields\Models\Type;

class Types extends Seeder
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
        $rows = [
            [
                'name' => 'custom-fields::general.type.select',
                'type' => 'select',
            ],
            [
                'name' => 'custom-fields::general.type.enabled',
                'type' => 'radio',
            ],
            [
                'name' => 'custom-fields::general.type.checkbox',
                'type' => 'checkbox',
            ],
            [
                'name' => 'custom-fields::general.type.text',
                'type' => 'text',
            ],
            [
                'name' => 'custom-fields::general.type.textarea',
                'type' => 'textarea',
            ],
            [
                'name' => 'custom-fields::general.type.date',
                'type' => 'date',
            ],
            [
                'name' => 'custom-fields::general.type.time',
                'type' => 'time',
            ],
            [
                'name' => 'custom-fields::general.type.date&time',
                'type' => 'dateTime',
            ],
        ];

        foreach ($rows as $row) {
            Type::firstOrCreate($row);
        }
    }
}
