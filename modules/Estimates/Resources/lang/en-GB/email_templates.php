<?php

return [
    'title'                    => 'Email Templates',
    'estimate_new_customer'    => [
        'subject' => '{estimate_number} estimate created',
        'body'    => 'Dear {customer_name},' .
                     '<br /><br />' .
                     'We have prepared the following estimate for you: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'You can see the estimate details from the following link: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Feel free to contact us for any question.' .
                     '<br /><br />' .
                     'Best Regards,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => '{estimate_number} estimate reminding notice',
        'body'    => 'Dear {customer_name},' .
                     '<br /><br />' .
                     'This is a reminding notice for <strong>{estimate_number}</strong> estimate.' .
                     '<br /><br />' .
                     'The estimate total is {estimate_total} and will be expired at <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'You can see the estimate details from the following link: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Best Regards,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => '{estimate_number} estimate reminding notice',
        'body'    => 'Hello,' .
                     '<br /><br />' .
                     'This is a reminding notice for <strong>{estimate_number}</strong> estimate to {customer_name}.'
                     .
                     '<br /><br />' .
                     'The estimate total is {estimate_total} and will be expired at <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'You can see the estimate details from the following link: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Best Regards,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => '{estimate_number} estimate approved',
        'body'    => 'Hello,' .
                     '<br /><br />' .
                     '{customer_name} approved <strong>{estimate_number}</strong> estimate.' .
                     '<br /><br />' .
                     'You can see the estimate details from the following link: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Best Regards,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => '{estimate_number} estimate refused',
        'body'    => 'Hello,' .
                     '<br /><br />' .
                     '{customer_name} refused <strong>{estimate_number}</strong> estimate.' .
                     '<br /><br />' .
                     'You can see the estimate details from the following link: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Best Regards,' .
                     '<br />' .
                     '{company_name}',
    ],

];
