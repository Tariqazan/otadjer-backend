<?php

return [
    'title'                    => 'قالب های ایمیل',
    'estimate_new_customer'    => [
        'subject' => '{estimate_number} برآورد ایجاد شده',
        'body'    => 'عزیز {customer_name},' .
                     '<br /><br />' .
                     'ما برآوردهای زیر را برای شما آماده کرده ایم: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'جزئیات برآورد را می توانید از لینک زیر مشاهده کنید: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'برای هر گونه سوال با ما تماس بگیرید.' .
                     '<br /><br />' .
                     'با احترام،' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => '{estimate_number} اعلان یادآوری برآورد',
        'body'    => '{customer_name} عزیز,' .
                     '<br /><br />' .
                     'این یک اعلان یادآوری است برای <strong>{estimate_number}</strong> برآورد.' .
                     '<br /><br />' .
                     'مجموع برآورد ها {estimate_total} و منقضی میشود در تاریخ <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'جزئیات برآورد را می توانید از لینک زیر مشاهده کنید: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'با احترام،' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => '{estimate_number} اعلان یادآوری برآورد',
        'body'    => 'سلام،' .
                     '<br /><br />' .
                     'این یک اعلان یادآوری است برای <strong>{estimate_number}</strong> برآورد برای {customer_name}.'
                     .
                     '<br /><br />' .
                     'مجموع برآورد ها {estimate_total} و منقضی میشود در تاریخ <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'جزئیات برآورد را می توانید از لینک زیر مشاهده کنید: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'با احترام،' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => '{estimate_number} برآورد تایید شد',
        'body'    => 'سلام،' .
                     '<br /><br />' .
                     '{customer_name} تایید شده <strong>{estimate_number}</strong> برآورد.' .
                     '<br /><br />' .
                     'جزئیات برآورد را می توانید از لینک زیر مشاهده کنید: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'با احترام،' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => '{estimate_number} برآورد رد شد',
        'body'    => 'سلام،' .
                     '<br /><br />' .
                     '{customer_name} رد شده <strong>{estimate_number}</strong> برآورد.' .
                     '<br /><br />' .
                     'جزئیات برآورد را می توانید از لینک زیر مشاهده کنید: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'با احترام،' .
                     '<br />' .
                     '{company_name}',
    ],

];
