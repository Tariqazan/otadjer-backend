<?php

return [

    'name'              => 'Egendefinerte felter',
    'description'       => 'Legg ubegrenset antall egendefinerte felter til forskjellige sider',

    'fields'            => 'Felt|Felter',
    'locations'         => 'Lokalisering|Lokaliseringer',
    'sort'              => 'Sorter',
    'order'             => 'Posisjon',
    'depend'            => 'Avhenge',
    'show'              => 'Vis',

    'form' => [
        'name'          => 'Navn',
        'code'          => 'Kode',
        'icon'          => 'FontAwsome ikon',
        'class'         => 'CSS klasse',
        'required'      => 'Obligatorisk',
        'rule'          => 'Validering',
        'before'        => 'Før',
        'after'         => 'Etter',
        'value'         => 'Verdi',
        'shows'         => [
            'always'    => 'Alltid',
            'never'     => 'Aldri',
            'if_filled' => 'Hvis utfylt'
        ]
    ],

    'type' => [
        'select'        => 'Velg',
        'radio'         => 'Radio',
        'checkbox'      => 'Avkryssningsboks',
        'text'          => 'Tekst',
        'textarea'      => 'Tekstboks',
        'date'          => 'Dato',
        'time'          => 'Tid',
        'date&time'     => 'Dato og tid'
    ],

    'item' => [
        'action'   => 'Artikkelhandling',
        'name'     => 'Artikkelnavn',
        'quantity' => 'Artikkelantall',
        'price'    => 'Artikkelpris',
        'taxes'    => 'Artikkelmoms',
        'total'    => 'Artikkeltotal',
    ],
];
