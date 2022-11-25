<?php

return [
    'name'                      => 'Inventari',
    'description'               => 'Comptabilitat i gestió d\'inventari sota un mateix sostre',

    'items'                     => 'Article|Articles',
    'inventories'               => 'Inventari|Inventaris',
    'options'                   => 'Opció|Opcions',
    'manufacturers'             => 'Fabricant|Fabricants',
    'transfer_orders'           => 'Ordre de transferència|Ordres de transferència',
    'warehouses'                => 'Magatzem|Magatzems',
    'histories'                 => 'Història|Històries',
    'item_groups'               => 'Grup|Grups',
    'sku'                       => 'SKU',
    'quantity'                  => 'Unitats',
    'edit_warehouse'            => 'Edita el magatzem :type',
    'default'                   => 'Per defecte',
    'stock'                     => 'Inventari',
    'information'               => 'Informació',
    'default_warehouse'         => 'Magatzem per defecte',
    'track_inventory'           => 'Seguir inventari',
    'negatif_stock'             => 'Inventari negatiu',
    'expented_income'           => 'Ingressos esperats',
    'sale_item_quantity'        => 'Unitats venudes',
    'sale_item_amount'          => 'Preu de venda de l\'article',
    'purchase_item_quantity'    => 'Unitats comprades',
    'purchase_item_amount'      => 'Preu de compra de l\'article',
    'income'                    => 'Ingrés',
    'invalid_stock'             => 'Inventari al magatzem :stock',
    'low_stock'                 => ':name Estoc baix (:count - :warehouse)',

    'menu' => [
        'inventory'             => 'Inventari',
        'item_groups'           => 'Grups',
        'options'               => 'Opcions',
        'manufacturers'         => 'Fabricant',
        'warehouses'            => 'Magatzems',
        'histories'             => 'Històries',
        'reports'               => 'Informes',
    ],

    'document' => [
        'detail'                => 'Es fa servir un magatzem de :type per tenir una comptabilitat adequada i per mantenir els informes precisos del teu :type.',
    ],

    'reports' => [
        'name' => [
            'stock_status'      => 'Estat de les existències',
            'sale_summary'      => 'Resum de vendes',
            'purchase_summary'  => 'Resum de compres',
            'income_status'     => 'Estat dels ingressos',
            'profit_loss'       => 'Guanys i pèrdues (Inventari)',
            'income_summary'    => 'Resum d\'ingressos (Inventari)',
            'expense_summary'   => 'Resum de despeses (Inventari)',
            'income_expense'    => 'Ingressos i despeses (Inventari)',

        ],

        'description' => [
            'stock_status'      => 'Seguiment d’existències d’articles',
            'sale_summary'      => 'Seguiment d\'existències d\'articles de venda',
            'purchase_summary'  => 'Seguiment d\'existències d\'articles de compra',
            'income_status'     => 'Estat d\'ingressos',
            'profit_loss'       => 'Resultat trimestral per inventari.',
            'income_summary'    => 'Resum mensual dels ingressos per inventari.',
            'expense_summary'   => 'Resum mensual de les despeses per inventari.',
            'income_expense'    => 'Ingressos/Despeses mensuals per inventari.',
        ],
    ],
];
