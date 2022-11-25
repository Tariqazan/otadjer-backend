<?php

return [

    'name'              => 'Camps personalitzables',
    'description'       => 'Afegeix un número il·limitat de camps personalitzables a qualsevol pàgina',

    'fields'            => 'Camp|Camps',
    'locations'         => 'Localització|Localitzacions',
    'sort'              => 'Ordena',
    'order'             => 'Posició',
    'depend'            => 'Dependència',
    'show'              => 'Mostra',

    'form' => [
        'name'          => 'Nom',
        'code'          => 'Codi',
        'icon'          => 'Icona FontAwesome',
        'class'         => 'Classe CSS',
        'required'      => 'Obligatori',
        'rule'          => 'Validació',
        'before'        => 'Abans de',
        'after'         => 'Després de',
        'value'         => 'Valor',
        'shows'         => [
            'always'    => 'Sempre',
            'never'     => 'Mai',
            'if_filled' => 'Si omplert'
        ],
        'items'         => 'Articles',
    ],

    'type' => [
        'select'        => 'Selecciona',
        'radio'         => 'Ràdio',
        'checkbox'      => 'Casella de selecció',
        'text'          => 'Text',
        'textarea'      => 'Àrea de text',
        'date'          => 'Data',
        'time'          => 'Hora',
        'date&time'     => 'Data i hora',
        'enabled'     => 'Activat',
    ],

    'item' => [
        'action'   => 'Acció de l\'article',
        'name'     => 'Nom de l\'article',
        'quantity' => 'Quantitat de l\'article',
        'price'    => 'Preu de l\'article',
        'taxes'    => 'Nom de l\'article',
        'total'    => 'Total de l\'article',
    ],

    'validation_rules' => [
        'required' => 'Obligatori',
        'string' => 'Cadena',
        'integer' => 'Enter',
        'date' => 'Data',
        'email' => 'Correu electrònic',
        'url' => 'Enllaç',
        'password' => 'Contrasenya',
    ],

];
