<?php

return [
    'title'                    => 'Modèles d\'e-mail',
    'sales_order_new_customer' => [
        'subject' => '{sales_order_number} Bon de commande créé',
        'body'    => 'Cher/Chère {customer_name},' .
                     '<br /><br />' .
                     'Merci de votre intérêt pour nos services. Veuillez trouver notre bon de commande joint à ce courrier.' .
                     '<br /><br />' .
                     '-------------------------------------------------' .
                     '<br />' .
                     'Montant: <strong>{sales_order_total}</strong>' .
                     '<br />' .
                     'Date: <strong>{sales_order_issued_at}</strong>' .
                     '<br />' .
                     'Numéro de commande : <strong>{sales_order_number}</strong>' .
                     '<br />' .
                     '-------------------------------------------------' .
                     '<br /><br />' .
                     'N\'hésitez pas à nous contacter pour toute question.' .
                     '<br /><br />' .
                     'Cordialement,' .
                     '<br />' .
                     '{company_name}',
    ],
    'purchase_order_new_vendor' => [
        'subject' => 'Bon de commande {purchase_order_number} créé',
        'body'    => 'Cher/Chère {customer_name},' .
                     '<br /><br />' .
                     'Veuillez trouver notre bon de commande joint avec ce courrier.' .
                     '<br /><br />' .
                     '-------------------------------------------------' .
                     '<br />' .
                     'Montant: <strong>{purchase_order_total}</strong>' .
                     '<br />' .
                     'Date: <strong>{purchase_order_issued_at}</strong>' .
                     '<br />' .
                     'Numéro de bon de commande : <strong>{purchase_order_number}</strong>' .
                     '<br />' .
                     '-------------------------------------------------' .
                     '<br /><br />' .
                     'Veuillez vérifier et confirmer la commande. Nous sommes impatients de travailler avec vous à nouveau' .
                     '<br /><br />' .
                     'Cordialement,' .
                     '<br />' .
                     '{company_name}',
    ],
];


