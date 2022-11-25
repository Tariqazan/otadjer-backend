<?php

use Modules\CustomFields\Models\Field;

return [
    Field::class => [
        'columns' => [
            'name' => ['searchable' => true],
            'enabled' => ['boolean' => true],
        ],
    ],
];
