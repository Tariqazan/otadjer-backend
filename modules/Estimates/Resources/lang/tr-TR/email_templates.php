<?php

return [
    'title'                    => 'E-Posta Teması',
    'estimate_new_customer'    => [
        'subject' => '{estimate_number} teklif oluşturuldu',
        'body'    => 'Sayın {customer_name},' .
                     '<br /><br />' .
                     'Sizin için aşağıdaki teklifi hazırladık: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Teklif ayrıntılarını aşağıdaki bağlantıdan görebilirsiniz: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Herhangi bir sorunuz için bizimle iletişime geçmekten çekinmeyin.' .
                     '<br /><br />' .
                     'Saygılarımızla,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => '{estimate_number} teklif hatırlatan uyarı',
        'body'    => 'Sayın {customer_name},' .
                     '<br /><br />' .
                     'Bu, <strong>{estimate_number}</strong> teklifi için hatırlatıcı bir uyarıdır.' .
                     '<br /><br />' .
                     'Teklif toplamı {estimate_total} ve süresi <strong> {estimate_expiry_date} </strong> tarihinde sona erecek.'
                     .
                     '<br /><br />' .
                     'Teklif ayrıntılarını aşağıdaki bağlantıdan görebilirsiniz: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Saygılarımızla,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => '{estimate_number} teklif hatırlatan uyarı',
        'body'    => 'Merhaba,' .
                     '<br /><br />' .
                     'Bu, {customer_name} için <strong>{estimate_number}</strong> teklifi için hatırlatan bir bildirimdir.'
                     .
                     '<br /><br />' .
                     'Teklif toplamı {estimate_total} ve süresi <strong> {estimate_expiry_date} </strong> tarihinde sona erecek.'
                     .
                     '<br /><br />' .
                     'Teklif ayrıntılarını aşağıdaki bağlantıdan görebilirsiniz: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Saygılarımla,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => '{estimate_number} teklifi onaylandı',
        'body'    => 'Merhaba,' .
                     '<br /><br />' .
                     '{customer_name} onaylı <strong>{estimate_number}</strong> teklif.' .
                     '<br /><br />' .
                     'Teklif ayrıntılarını aşağıdaki bağlantıdan görebilirsiniz: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Saygılarımla,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => '{estimate_number} teklifi reddet',
        'body'    => 'Merhaba,' .
                     '<br /><br />' .
                     '{customer_name} reddetti <strong>{estimate_number}</strong> teklifler.' .
                     '<br /><br />' .
                     'Teklif ayrıntılarını aşağıdaki bağlantıdan görebilirsiniz: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Saygılarımızla,' .
                     '<br />' .
                     '{company_name}',
    ],

];
