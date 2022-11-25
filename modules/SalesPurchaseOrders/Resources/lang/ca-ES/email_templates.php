<?php

return [
    'title'                    => 'Plantilles de correu electrònic',
    'sales_order_new_customer' => [
        'subject' => 'S\'ha creat la comanda de venda {sales_order_number}',
        'body'    => 'Benvolugut/da {customer_name},' .
                     '<br /><br />' .
                     'Gràcies pel teu interès en els nostres serveis. Trobaràs la comanda adjunta a aquest correu.' .
                     '<br /><br />' .
                     '-------------------------------------------------' .
                     '<br />' .
                     'Total: <strong>{sales_order_total}</strong>' .
                     '<br />' .
                     'Data: <strong>{sales_order_issued_at}</strong>' .
                     '<br />' .
                     'Número de comanda: <strong>{sales_order_number}</strong>' .
                     '<br />' .
                     '-------------------------------------------------' .
                     '<br /><br />' .
                     'No dubtis a contactar amb nosaltres per qualsevol dubte.' .
                     '<br /><br />' .
                     'Salutacions,' .
                     '<br />' .
                     '{company_name}',
    ],
    'purchase_order_new_customer' => [
        'subject' => 'S\'ha creat la comanda de compra {purchase_order_number}',
        'body'    => 'Benvolgut/da {customer_name}' .
                     '<br /><br />' .
                     'Pots trobar la comanda de compra adjunta a aquest correu.' .
                     '<br /><br />' .
                     '-------------------------------------------------' .
                     '<br />' .
                     'Total: <strong>{purchase_order_total}</strong>' .
                     '<br />' .
                     'Data: <strong>{purchase_order_issued_at}</strong>' .
                     '<br />' .
                     'Número de comanda: <strong>{purchase_order_number}</strong>' .
                     '<br />' .
                     '-------------------------------------------------' .
                     '<br /><br />' .
                     'Si us plau confirma la comanda. Esperem que continuis confiant amb nosaltres en el futur' .
                     '<br /><br />' .
                     'Salutacions,' .
                     '<br />' .
                     '{company_name}',
    ],
];


