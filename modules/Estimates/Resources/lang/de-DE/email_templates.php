<?php

return [
    'title'                    => 'E-Mail-Vorlagen',
    'estimate_new_customer'    => [
        'subject' => 'Angebot {estimate_number} erstellt',
        'body'    => 'Guten Tag {customer_name},' .
                     '<br /><br />' .
                     'Wir haben für Sie das folgenden Angebot vorbereitet: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Das Angebot finden Sie unter folgendem Link: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Falls Sie Fragen haben sollten, kontaktieren Sie uns doch einfach.' .
                     '<br /><br />' .
                     'Mit freundlichen Grüßen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => 'Erinnerung für das Angebot {estimate_number}',
        'body'    => 'Guten Tag {customer_name},' .
                     '<br /><br />' .
                     'Dies ist eine Erinnerungsmeldung für das Angebot <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Der offerierte Gesamtbetrag beträgt {estimate_total} und ist bis am <strong>{estimate_expiry_date}</strong> gültig.'
                     .
                     '<br /><br />' .
                     'Das Angebot finden Sie unter folgendem Link: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Mit freundlichen Grüßen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => 'Erinnerung für das Angebot {estimate_number}',
        'body'    => 'Guten Tag,' .
                     '<br /><br />' .
                     'Dies ist eine Erinnerungsmeldung für das Angebot <strong>{estimate_number}</strong>.'
                     .
                     '<br /><br />' .
                     'Der offerierte Gesamtbetrag beträgt {estimate_total} und ist bis am <strong>{estimate_expiry_date}</strong> gültig.'
                     .
                     '<br /><br />' .
                     'Das Angebot finden Sie unter folgendem Link: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Mit freundlichen Grüßen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => 'Angebot {estimate_number} zugesagt',
        'body'    => 'Guten Tag,' .
                     '<br /><br />' .
                     '{customer_name} hat für das Angebot <strong>{estimate_number}</strong> zugesagt.' .
                     '<br /><br />' .
                     'Das Angebot finden Sie unter folgendem Link: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Mit freundlichen Grüßen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => 'Angebot {estimate_number} abgelehnt',
        'body'    => 'Guten Tag,' .
                     '<br /><br />' .
                     '{customer_name} hat das Angebot <strong>{estimate_number}</strong> abgelehnt.' .
                     '<br /><br />' .
                     'Das Angebot finden Sie unter folgendem Link: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Mit freundlichen Grüßen,' .
                     '<br />' .
                     '{company_name}',
    ],

];
