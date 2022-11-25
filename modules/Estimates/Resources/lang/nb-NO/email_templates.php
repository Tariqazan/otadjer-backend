<?php

return [
    'title'                    => 'E-postmaler',
    'estimate_new_customer'    => [
        'subject' => 'Tilbud {estimate_number} opprettet',
        'body'    => 'Kjære {customer_name},' .
                     '<br /><br />' .
                     'Vi har laget følgende tilbud til deg: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Du kan se tilbudsdetaljene fra følgende lenke: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Vennligst kontakt oss ved eventuelle spørsmål.' .
                     '<br /><br />' .
                     'Vennlig hilsen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => 'Tilbud {estimate_number} påminnelsesnotis',
        'body'    => 'Kjære {customer_name},' .
                     '<br /><br />' .
                     'Dette er et påminnelsesnotis for tilbud <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Total for tilbud er {estimate_total} og vil utløpe <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Du kan se tilbudsdetaljer på følgende lenke: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Vennlig hilsen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => 'Tilbud {estimate_number} påminnelsesnotis',
        'body'    => 'God dag,' .
                     '<br /><br />' .
                     'Dette er et påminnelsesnotis for tilbud <strong>{estimate_number}</strong> til {customer_name}.'
                     .
                     '<br /><br />' .
                     'Total for tilbud er {estimate_total} og vil utløpe <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Du kan se tilbudsdetaljene fra følgende lenke: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Vennlig hilsen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => 'Tilbud {estimate_number} godkjent',
        'body'    => 'God dag,' .
                     '<br /><br />' .
                     '{customer_name} godkjente tilbud <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Du kan se tilbudsdetaljer på følgende lenke: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Vennlig hilsen,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => 'Tilbud {estimate_number} ble avvist',
        'body'    => 'God dag,' .
                     '<br /><br />' .
                     '{customer_name} avviste tilbud <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Du kan se tilbudsdetaljer på følgende lenke: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Vennlig hilsen,' .
                     '<br />' .
                     '{company_name}',
    ],

];
