<?php

return [
    'name'                      => 'Inventory',
    'description'               => 'Accounting and inventory management under one roof',

    'items'                     => 'Item|Items',
    'inventories'               => 'Inventory|Inventories',
    'variants'                  => 'Variant|Variants',
    'manufacturers'             => 'Manufacturer|Manufacturers',
    'transfer_orders'           => 'Transfer Order|Transfer Orders',
    'adjustments'               => 'Adjustment|Adjustments',
    'warehouses'                => 'Warehouse|Warehouses',
    'histories'                 => 'History|Histories',
    'item_groups'               => 'Group|Groups',
    'barcode'                   => 'Barcode',
    'print_barcode'             => 'Print Barcode',
    'sku'                       => 'SKU',
    'quantity'                  => 'Quantity',
    'add_warehouse'             => 'Add Warehouse',
    'edit_warehouse'            => 'Edit Warehouse',
    'default'                   => 'Default',
    'stock'                     => 'Stock',
    'information'               => 'Information',
    'default_warehouse'         => 'Default Warehouse',
    'track_inventory'           => 'Track Inventory',
    'negatif_stock'             => 'Negatif Stock',
    'expented_income'           => 'Expented Income',
    'sale_item_quantity'        => 'Sale Item Quantity',
    'sale_item_amount'          => 'Sale Item Amount',
    'purchase_item_quantity'    => 'Purchase Item Quantity',
    'purchase_item_amount'      => 'Purchase Item Amount',
    'income'                    => 'Income',
    'invalid_stock'             => 'Stock in warehouse :stock',
    'low_stock'                 => ':name Low Stock (:count - :warehouse)',
    'unit'                      => 'Unit',
    'returnable'                => 'Returnable Item',
    'overview'                  => 'Overview',
    'action'                    => 'Action',
    'record'                    => 'Record',
    'required_fields'           => 'The :attribute field are required.',

    'menu' => [
        'inventory'             => 'Inventory',
        'item_groups'           => 'Groups',
        'variants'               => 'Variants',
        'manufacturers'         => 'Manufacturer',
        'warehouses'            => 'Warehouses',
        'histories'             => 'Histories',
        'reports'               => 'Reports',
    ],

    'notifications' => [
        'reorder_level'         => ':count Item Reorder Level',
    ],

    'document' => [
        'detail'                => 'An :class warehouse is used for proper bookkeeping of your :type and to keep your reports accurate.',
    ],

    'empty' => [
        'adjustments'           => "Because of some reasons such as damaged items and stolen items etc.,
                                    your company's real stocks and recorded stocks may not be equal.
                                    Inventory adjustment provides you to record missing items.",
        'warehouses'            => 'You can add manage multiple warehouses.
                                    You can also track stock control of all your items by warehouses.
                                    Warehouse Overview and History give you insight into warehouses operations.',
        'transfer-orders'       => 'Transfer Order allows you to keep track of item movement from one warehouse to another.',
        'variants'              => 'In the Variants section, you can add and manage variants that describe your items better.
                                    You can create a group of items that have the same variants such as color, size, etc.',
        'item-groups'           => 'In the Groups section, you can manage your items that can be considered under the same group.
                                    You can select variants, add new items and manage their details from groups.',
        'title' => [
            'adjustments'       => 'Adjustment',
            'warehouses'        => 'Warehouses',
            'transfer-orders'   => 'Transfer Orders',
            'variants'          => 'Variants',
            'item-groups'       => 'Item Groups',
        ]
    ],

    'reports' => [
        'name' => [
            'stock_status'      => 'Stock Status',
            'sale_summary'      => 'Sale Summary',
            'purchase_summary'  => 'Purchase Summary',
            'item_summary'      => 'Item Summary',
            'profit_loss'       => 'Profit & Loss (Inventory)',
            'income_summary'    => 'Income Summary (Inventory)',
            'expense_summary'   => 'Expense Summary (Inventory)',
            'income_expense'    => 'Income vs Expense (Inventory)',
        ],

        'description' => [
            'stock_status'      => 'Stock tracking of items',
            'sale_summary'      => 'Stock tracking of sales items',
            'purchase_summary'  => 'Stock tracking of purchases items',
            'item_summary'      => 'The list of the Item Information',
            'profit_loss'       => 'Quarterly profit & loss by inventory.',
            'income_summary'    => 'Monthly income summary by inventory.',
            'expense_summary'   => 'Monthly expense summary by inventory.',
            'income_expense'    => 'Monthly income vs expense by inventory.',
        ],
    ],
];
