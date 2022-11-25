<?php

return [
    'description'                => 'Personalitza el prefix de les comandes, el número, les condicions, el peu, etc.',
    'invoice_number'             => 'Número de comanda de compra',
    'vendors'                    => 'Proveïdor|Proveïdors',
    'invoice_date'               => 'Data de la comanda de compra',
    'expected_delivery_date'     => 'Data esperada d\'enviament',
    'order_number'               => 'Referència',
    'create_purchase_order'      => 'Crea una comanda de compra',
    'send_invoice'               => 'Envia una comanda de compra',
    'amount_due'                 => 'Quantitat',
    'confirm_purchase_orders'    => 'Confirma la comanda de compra',
    'mark_issued'                => 'Marca com emesa',
    'convert_to_bill'            => 'Converteix en factura',
    'summary_report_type'        => 'Resum de comandes de compra',
    'summary_report_description' => 'Resum mensual de comandes de compra per proveïdors',
    'messages'                   => [
        'draft' => 'Això és un <b>ESBORRANY</b> de comanda de compra i es reflectirà als gràfics un cop s\'hagi enviat.',
    ],
    'statuses'                   => [
        'draft'      => 'Esborrany',
        'sent'       => 'Enviat',
        'billed'     => 'Facturat',
        'not_billed' => 'No facturat',
        'issued'     => 'Emès',
        'not_issued' => 'No emès',
        'cancelled'  => 'Cancel·lat',
    ],
];
