<?php

return [
    'title'                    => 'Email Templates',
    'sales_order_new_customer' => [
        'subject' => '{sales_order_number} Sales Order created',
        'body'    => 'Dear {customer_name},' .
                     '<br /><br />' .
                     'Thanks for your interest in our services. Please find our sales order attached with this mail.' .
                     '<br /><br />' .
                     '-------------------------------------------------' .
                     '<br />' .
                     'Amount: <strong>{sales_order_total}</strong>' .
                     '<br />' .
                     'Date: <strong>{sales_order_issued_at}</strong>' .
                     '<br />' .
                     'Sales Order Number: <strong>{sales_order_number}</strong>' .
                     '<br />' .
                     '-------------------------------------------------' .
                     '<br /><br />' .
                     'Feel free to contact us for any question.' .
                     '<br /><br />' .
                     'Best Regards,' .
                     '<br />' .
                     '{company_name}',
    ],
    'purchase_order_new_vendor' => [
        'subject' => '{purchase_order_number} Purchase Order created',
        'body'    => 'Dear {vendor_name},' .
                     '<br /><br />' .
                     'Please find our purchase order attached with this mail.' .
                     '<br /><br />' .
                     '-------------------------------------------------' .
                     '<br />' .
                     'Amount: <strong>{purchase_order_total}</strong>' .
                     '<br />' .
                     'Date: <strong>{purchase_order_issued_at}</strong>' .
                     '<br />' .
                     'Purchase Order Number: <strong>{purchase_order_number}</strong>' .
                     '<br />' .
                     '-------------------------------------------------' .
                     '<br /><br />' .
                     'Please go through it and confirm the order. We look forward to working with you again' .
                     '<br /><br />' .
                     'Best Regards,' .
                     '<br />' .
                     '{company_name}',
    ],
];


