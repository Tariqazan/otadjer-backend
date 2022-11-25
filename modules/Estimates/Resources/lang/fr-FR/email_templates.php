<?php

return [
    'title'                    => 'Modèles d\'e-mail',
    'estimate_new_customer'    => [
        'subject' => '{estimate_number} devis créé',
        'body'    => 'Cher {customer_name},' .
                     '<br /><br />' .
                     'Nous vous avons préparé le devis suivant : ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Vous pouvez consulter les détails du devis à partir du lien suivant : ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'N\'hésitez pas à nous contacter pour toute question.' .
                     '<br /><br />' .
                     'Cordialement,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => 'Avis de rappel du devis {estimate_number}',
        'body'    => 'Cher {customer_name},' .
                     '<br /><br />' .
                     'Ceci est un rappel pour le devis <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Le total du devis est de {estimate_total} et expirera le <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Vous pouvez consulter les détails du devis à partir du lien suivant : ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Cordialement,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => 'Avis de rappel du devis {estimate_number}',
        'body'    => 'Bonjour,' .
                     '<br /><br />' .
                     'Ceci est un rappel pour le devis <strong>{estimate_number}</strong> destiné à {customer_name}.'
                     .
                     '<br /><br />' .
                     'Le total du devis est de {estimate_total} et expirera le <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Vous pouvez consulter les détails du devis à partir du lien suivant : ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Cordialement,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => '{estimate_number} devis approuvé',
        'body'    => 'Bonjour,' .
                     '<br /><br />' .
                     'Le client {customer_name} a approuvé le devis <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Vous pouvez consulter les détails du devis à partir du lien suivant : ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Cordialement,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => '{estimate_number} devis refusé',
        'body'    => 'Bonjour,' .
                     '<br /><br />' .
                     'Le client {customer_name} a refusé le devis <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Vous pouvez consulter les détails du devis à partir du lien suivant : ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Cordialement,' .
                     '<br />' .
                     '{company_name}',
    ],

];
