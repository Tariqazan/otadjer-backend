<?php

return [
    Modules\CompositeItems\Models\CompositeItem::class => [
        'columns' => [
            'items.name' => ['searchable' => true],
            'items.enabled' => ['boolean' => true],
        ],
    ],
];
