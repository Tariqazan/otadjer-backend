<?php

return [

    'name'              => 'Champs personnalisés',
    'description'       => 'Ajoutez un nombre illimité de champs personnalisés à différentes pages',

    'fields'            => 'Champ|Champs',
    'locations'         => 'Emplacement|Emplacements',
    'sort'              => 'Trier',
    'order'             => 'Emplacement',
    'depend'            => 'Dépendance',
    'show'              => 'Montrer',
    'design'            => 'Design',

    'form' => [
        'name'          => 'Nom',
        'code'          => 'Code',
        'icon'          => 'Icône FontAwesome',
        'class'         => 'Classe CSS',
        'required'      => 'Obligatoire',
        'rule'          => 'Validation',
        'before'        => 'Avant',
        'after'         => 'Après',
        'value'         => 'Valeur',
        'shows'         => [
            'always'    => 'Toujours',
            'never'     => 'Jamais',
            'if_filled' => 'Si completé'
        ],
        'items'         => 'Articles',
    ],

    'type' => [
        'select'        => 'Sélection',
        'radio'         => 'Radio',
        'checkbox'      => 'Case à cocher',
        'text'          => 'Texte',
        'textarea'      => 'Zone de texte',
        'date'          => 'Date',
        'time'          => 'Heure',
        'date&time'     => 'Date & Heure',
        'enabled'       => 'Activé',
        'toggle'        => 'Basculer',
    ],

    'item' => [
        'action'   => 'Action de l\'article',
        'name'     => 'Nom de l\'article',
        'quantity' => 'Nombre d\'articles',
        'price'    => 'Prix de l\'article',
        'taxes'    => 'TVA de l\'article',
        'total'    => 'Total articles',
    ],

    'validation_rules' => [
        'required' => 'Requis',
        'string' => 'Chaîne de caractères',
        'integer' => 'Nombre entier',
        'date' => 'Date',
        'email' => 'Email',
        'url' => 'URL',
        'password' => 'Mot de passe',
    ],

    'section-head' => [
        'general' => 'Cette information est visible dans le titre du nouveau champ que vous créez.',
        'type' => 'Sélectionnez le format de champ que vous souhaitez voir dans l\'interface. La validation vous permet de définir des règles pour les champs.',
        'location' => 'Sélectionnez où le champ personnalisé est affiché et triez-le.',
        'design' => 'Ajustez la largeur des champs personnalisés à travers la classe CSS et sélectionnez la visibilité sur la page d\'affichage.',
    ],

];
