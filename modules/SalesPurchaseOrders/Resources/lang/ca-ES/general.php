<?php

return [

    'name'                   => 'Vendes i Ordres de compra',
    'description'            => 'Simplifica les vendes en línia i la gestió de comandes de compra',
    'sales_orders'           => 'Comanda|Comandes',
    'purchase_orders'        => 'Compra|Compres',
    'purchase_order_summary' => 'Resum de comandes de compra',
    'mark_sent'              => 'Marca com enviada',
    'converted_to_document'  => 'S\'ha convertit en :type :document_number',
    'created_from_document'  => 'Creat des de :type :document_number',
    'messages'               => [
        'marked_confirmed' => 'S\'ha marcat :type com confirmat!',
        'marked_issued'    => 'S\'ha marcat :type com enviat!',
    ],
    'empty'                  => [
        'sales_orders'    => 'Una comanda de venda és un document enviat als vostres clients que confirma els articles i els preus d\'una venda.',
        'purchase_orders' => 'Una comanda de compra és un document oficial que un comprador emet a un venedor indicant els articles que vol comprar, les seves quantitats i els seus preus.',
    ],
];
