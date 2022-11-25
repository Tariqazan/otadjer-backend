<?php

return [
    'title'                    => 'Шаблони E-mail',
    'estimate_new_customer'    => [
        'subject' => '{estimate_number} підрахунок створено',
        'body'    => 'Шановний {customer_name},' .
                     '<br /><br />' .
                     'Ми підготували для вас наступну оцінку: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Ви можете побачити інформацію про розрахунок за цим посиланням: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Не соромтеся зв\'язатися з нами з будь-яких питань.' .
                     '<br /><br />' .
                     'З найкращими побажаннями,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => '{estimate_number} заплановане нагадування повідомлення',
        'body'    => 'Шановний {customer_name},' .
                     '<br /><br />' .
                     'Це нагадування про платіж <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Загальна сума {estimate_total} і термін дії закінчується <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Ви можете побачити інформацію про розрахунок за цим посиланням: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'З найкращими побажаннями,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => '{estimate_number} заплановане нагадування повідомлення',
        'body'    => 'Вітаємо,' .
                     '<br /><br />' .
                     'Це нагадування про платіж <strong>{estimate_number}</strong>.'
                     .
                     '<br /><br />' .
                     'Загальна сума {estimate_total} і термін дії закінчується <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Ви можете побачити інформацію про розрахунок за цим посиланням: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'З найкращими побажаннями,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => '{estimate_number} платіж схвалено',
        'body'    => 'Вітаємо,' .
                     '<br /><br />' .
                     '{customer_name} схвалив <strong>{estimate_number}</strong> платіж.' .
                     '<br /><br />' .
                     'Ви можете побачити інформацію про розрахунок за цим посиланням: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'З найкращими побажаннями,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => '{estimate_number} підрахунок відхилено',
        'body'    => 'Вітаємо,' .
                     '<br /><br />' .
                     '{customer_name} відхилив <strong>{estimate_number}</strong> оцінку.' .
                     '<br /><br />' .
                     'Ви можете побачити інформацію про розрахунок за цим посиланням: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'З найкращими побажаннями,' .
                     '<br />' .
                     '{company_name}',
    ],

];
