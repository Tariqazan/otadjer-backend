<?php

return [

    Modules\Crm\Models\Contact::class => [
        'columns' => [
            'id',
            'contacts.name' => ['searchable' => true],
            'contacts.email' => ['searchable' => true],
            'contacts.phone' => ['searchable' => true],
            // 'enabled' => ['boolean' => true],
            'stage' => ['searchable' => true],
            // 'created_date' => ['date' => true],
        ],
    ],

    Modules\Crm\Models\Company::class => [
        'columns' => [
            'id',
            'contacts.name' => ['searchable' => true],
            'contacts.email' => ['searchable' => true],
            'contacts.phone' => ['searchable' => true],
            // 'enabled' => ['boolean' => true],
            'stage' => ['searchable' => true],
            // 'created_date' => ['date' => true],
        ],
    ],
];