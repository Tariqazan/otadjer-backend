<?php

return [
    'description'                => 'Personalitza el prefix de les comandes, el número, les condicions, el peu, etc.',
    'invoice_number'             => 'Número de comanda de venda',
    'invoice_date'               => 'Data de la comanda de venda',
    'expected_shipment_date'     => 'Data esperada de l\'enviament',
    'order_number'               => 'Referència',
    'create_sales_order'         => 'Crea comanda de venda',
    'send_invoice'               => 'Envia comanda de venda',
    'amount_due'                 => 'Quantitat',
    'confirm_sales_orders'       => 'Valida la comanda de venda',
    'mark_confirmed'             => 'Marca com a confirmada',
    'convert_to_invoice'         => 'Converteix en factura',
    'convert_to_purchase_order'  => 'Converteix en comanda de compra',
    'summary_report_type'        => 'Resum de les comandes de venda',
    'summary_report_description' => 'Resum mensual de les comandes de venda per clients',
    'messages'                   => [
        'draft' => 'Això és un <b>ESBORRANY</b> de comanda de venda i es reflectirà als gràfics un cop s\'hagi enviat.',
    ],
    'statuses'                   => [
        'draft'         => 'Esborrany',
        'sent'          => 'Enviat',
        'invoiced'      => 'Facturat',
        'not_invoiced'  => 'No facturat',
        'confirmed'     => 'Confirmat',
        'not_confirmed' => 'No confirmat',
        'cancelled'     => 'Cancel·lat',
    ],
];
