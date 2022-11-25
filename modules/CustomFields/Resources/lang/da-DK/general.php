<?php

return [

    'name'              => 'Brugerdefinerede felter',
    'description'       => 'Tilføj et ubegrænset antal brugerdefinerede felter til forskellige sider',

    'fields'            => 'Felt|Felter',
    'locations'         => 'Sted|Steder',
    'sort'              => 'Sorter',
    'order'             => 'Position',
    'depend'            => 'Afhænge af',
    'show'              => 'Vis',

    'form' => [
        'name'          => 'Navn',
        'code'          => 'Kode',
        'icon'          => 'FontAwesome ikon',
        'class'         => 'CSS-klasse',
        'required'      => 'Nødvendig',
        'rule'          => 'Validering',
        'before'        => 'Før',
        'after'         => 'Efter',
        'value'         => 'Værdi',
        'shows'         => [
            'always'    => 'Altid',
            'never'     => 'Aldrig',
            'if_filled' => 'Hvis udfyldt'
        ],
        'items'         => 'Varer',
    ],

    'type' => [
        'select'        => 'Vælg',
        'radio'         => 'Radio',
        'checkbox'      => 'Afkrydsningsfelt',
        'text'          => 'Tekst',
        'textarea'      => 'Tekstområde',
        'date'          => 'Dato',
        'time'          => 'Tid',
        'date&time'     => 'Dato & Tid',
        'enabled'     => 'Aktiveret',
    ],

    'item' => [
        'action'   => 'Element Handling',
        'name'     => 'Varenavn',
        'quantity' => 'Vare kvalitet',
        'price'    => 'Vare pris',
        'taxes'    => 'Vareskatter',
        'total'    => 'Vare Total',
    ],

    'validation_rules' => [
        'required' => 'Påkrævet',
        'string' => 'Streng',
        'integer' => 'Heltal',
        'date' => 'Dato',
        'email' => 'E-mail',
        'url' => 'URL',
        'password' => 'Adgangskode',
    ],

];
