<?php

return [

    'name' => '在庫',
    'description' => '1つの屋根の下での会計と在庫管理',

    'menu' => [
        'inventory' => '棚卸',
        'item_groups' => 'グループ',
        'options' => 'オプション',
        'manufacturers' => '製造元',
        'warehouses' => '倉庫',
        'histories' => '記録',
        'reports' => 'レポート',
    ],

    'inventories' => '在庫|在庫',
    'options' => 'オプション|オプション',
    'manufacturers' => 'メーカー|メーカー',
    'warehouses' => '倉庫|倉庫',
    'histories' => '歴史|歴史',
    'item_groups' => 'グループ|グループ',
    'sku' => 'SKU',
    'quantity' => '数量',

    'information' => '情報',
    'default_warehouse' => 'Default Warehouse',

    'reports' => [

        'name' => [
            'profit_loss'       => 'Profit & Loss (Inventory)',
            'income_summary'    => 'Income Summary (Inventory)',
            'expense_summary'   => 'Expense Summary (Inventory)',
            'income_expense'    => 'Income vs Expense (Inventory)',
        ],

        'description' => [
            'profit_loss'       => 'Quarterly profit & loss by inventory.',
            'income_summary'    => 'Monthly income summary by inventory.',
            'expense_summary'   => 'Monthly expense summary by inventory.',
            'income_expense'    => 'Monthly income vs expense by inventory.',
        ],
    ],
];
