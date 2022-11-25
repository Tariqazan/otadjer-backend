<?php

return [

    'name'              => 'Zonat e Zakonta',
    'description'       => 'Shto zona të zakonta me porosi në faqe të ndryshme',

    'fields'            => 'Zonë|Zonat',
    'locations'         => 'Lokacioni | Lokacionet',
    'sort'              => 'Renditja',
    'order'             => 'Pozicioni',
    'depend'            => 'Varet',
    'show'              => 'Shfaq',

    'form' => [
        'name'          => 'Emri',
        'code'          => 'Kodi',
        'icon'          => 'Ikona FontAwesome',
        'class'         => 'Klasa CSS',
        'required'      => 'E nevojshme',
        'rule'          => 'Validimi',
        'before'        => 'Para',
        'after'         => 'Pas',
        'value'         => 'Vlera',
        'shows'         => [
            'always'    => 'Gjithmonë',
            'never'     => 'Asnjeherë',
            'if_filled' => 'Nëse Mbushur'
        ]
    ],

    'type' => [
        'select'        => 'Zgjidh',
        'radio'         => 'Radio',
        'checkbox'      => 'Checkbox',
        'text'          => 'Teksti',
        'textarea'      => 'Fushë Teksti',
        'date'          => 'Data',
        'time'          => 'Ora',
        'date&time'     => 'Data & Ora'
    ],

    'item' => [
        'action'   => 'Aksioni i Artikullit',
        'name'     => 'Emri i Artikullit',
        'quantity' => 'Sasia e Artikullit',
        'price'    => 'Çmimi i Artikullit',
        'taxes'    => 'Taksat e Artikullit',
        'total'    => 'Totali i Artikullit',
    ],
];
