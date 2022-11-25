<?php

return [
    'title'                    => 'قوالب البريد الإلكتروني',
    'estimate_new_customer'    => [
        'subject' => '{estimate_number} تم إنشاء التقدير',
        'body'    => 'عزيزي {customer_name},' .
                     '<br /><br />' .
                     'لقد أعددنا التقدير التالي لك: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'يمكنك الاطلاع على تفاصيل التقدير من الرابط التالي: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'لا تتردد في الاتصال بنا لأي سؤال.' .
                     '<br /><br />' .
                     'مع خالص تحياتي' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => '{estimate_number} إشعار التقدير المتبقي',
        'body'    => 'عزيزي {customer_name},' .
                     '<br /><br />' .
                     'هذا نذكير متبقي ل <strong>{estimate_number}</strong> تقدير.' .
                     '<br /><br />' .
                     'مجموع التقدير هو {estimate_total} وسوف ينقضي في <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'يمكنك الاطلاع على تفاصيل التقدير من الرابط التالي: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'أطيب التمنيات' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => '{estimate_number} إشعار التقدير المتبقي',
        'body'    => 'مرحباً,' .
                     '<br /><br />' .
                     'هذا نذكير متبقي ل <strong>{estimate_number}</strong> تقدير ل {customer_name}.'
                     .
                     '<br /><br />' .
                     'مجموع التقدير هو {estimate_total} وسوف ينقضي في <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'يمكنك الاطلاع على تفاصيل التقدير من الرابط التالي: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'أطيب التمنيات' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => '{estimate_number} تم الموافقة على التقدير',
        'body'    => 'مرحباً,' .
                     '<br /><br />' .
                     '{customer_name} تم الموافقة عليه <strong>{estimate_number}</strong> تقدير.' .
                     '<br /><br />' .
                     'يمكنك الاطلاع على تفاصيل التقدير من الرابط التالي: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'أطيب التمنيات' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => '{estimate_number} تم رفض التقدير',
        'body'    => 'مرحباً,' .
                     '<br /><br />' .
                     '{customer_name} تم رفض <strong>{estimate_number}</strong> التقدير.' .
                     '<br /><br />' .
                     'يمكنك الاطلاع على تفاصيل التقدير من الرابط التالي: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'مع خالص تحياتي' .
                     '<br />' .
                     '{company_name}',
    ],

];
