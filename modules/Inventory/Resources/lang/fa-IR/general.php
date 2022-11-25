<?php

return [

    'name' => 'فهرست موجودی',
    'description' => 'حسابداری و مدیریت موجودی در یک محل',

    'menu' => [
        'inventory' => 'فهرست موجودی',
        'item_groups' => 'گروه ها',
        'options' => 'گزینه‌ها',
        'manufacturers' => 'سازنده',
        'warehouses' => 'انبارها',
        'histories' => 'تاریخچه',
        'reports' => 'گزارشات',
    ],

    'inventories' => 'موجودی | موجودی ها',
    'options' => 'گزینه | گزینه ها',
    'manufacturers' => 'سازنده | سازندگان',
    'transfer_orders' => 'سفارش انتقال | سفارشات انتقال',
    'warehouses' => 'انبار | انبارها',
    'histories' => 'تاریخچه | تاریخچه ها',
    'item_groups' => 'گروه|گروه‌ها',
    'sku' => 'SKU',
    'quantity' => 'تعداد',
    'edit_warehouse' => 'ویرایش :type Warehouse',

    'information' => 'اطلاعات',
    'default_warehouse' => 'انبار پیش فرض',
    'track_inventory'   => 'پیگیری لیست موجودی',
    'expented_income'   => 'درآمد پیش بینی شده',
    'sale_item_quantity' => 'تعداد آیتم های فروش',
    'sale_item_amount' => 'مبلغ مورد فروش',
    'purchase_item_quantity' => 'مقدار مورد خرید',
    'purchase_item_amount' => 'مبلغ مورد خرید',
    'income'    => 'درآمد',

    'document' => [
        'detail' => 'An :کلاس انبار برای دفترداری شما استفاده می شود :تایپ کنید و گزارشات خود را دقیق نگه دارید.',
    ],

    'reports' => [
        'name' => [
            'stock_status'      => 'وضعیت موجودی',
            'sale_summary'       => 'خلاصه فروش',
            'purchase_summary'   => 'خلاصه خرید',
            'income_status'     => 'وضعیت درآمد',
            'profit_loss'       => 'سود و ضرر (موجودی)',
            'income_summary'    => 'خلاصه درآمد (موجودی)',
            'expense_summary'   => 'خلاصه هزینه (موجودی)',
            'income_expense'    => 'درآمد در مقابل هزینه (موجودی)',

        ],

        'description' => [
            'stock_status'      => 'ردیابی موجودی آیتم ها',
            'sale_summary'       => 'پیگیری موجودی آیتم ها',
            'purchase_summary'   => 'پیگیری موجودی از آیتم های خرید',
            'income_status'     => 'وضعیت درآمد',
            'profit_loss'       => 'سود و ضرر سه ماهه موجودی.',
            'income_summary'    => 'خلاصه درآمد ماهانه توسط موجودی.',
            'expense_summary'   => 'خلاصه ماهانه هزینه موجودی.',
            'income_expense'    => 'درآمد ماهانه در مقابل هزینه موجودی.',
        ],
    ],
];
