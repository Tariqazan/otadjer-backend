<?php

return [
    'description'                => 'Customize sales order prefix, number, terms, footer etc',
    'invoice_number'             => 'Sales Order Number',
    'invoice_date'               => 'Sales Order Date',
    'expected_shipment_date'     => 'Expected Shipment Date',
    'order_number'               => 'Reference',
    'create_sales_order'         => 'Create Sales Order',
    'send_invoice'               => 'Send Sales Order',
    'amount_due'                 => 'Amount',
    'confirm_sales_orders'       => 'Confirm Sales Order',
    'mark_confirmed'             => 'Mark Confirmed',
    'convert_to_invoice'         => 'Convert to Invoice',
    'convert_to_purchase_order'  => 'Convert to Purchase Order',
    'summary_report_type'        => 'Sales Order Summary',
    'summary_report_description' => 'Monthly sales order summary by customers',
    'messages'                   => [
        'draft' => 'This is a <b>DRAFT</b> sales order and will be reflected to charts after it gets sent.',
    ],
    'statuses'                   => [
        'draft'         => 'Draft',
        'sent'          => 'Sent',
        'invoiced'      => 'Invoiced',
        'not_invoiced'  => 'Not invoiced',
        'confirmed'     => 'Confirmed',
        'not_confirmed' => 'Not confirmed',
        'cancelled'     => 'Cancelled',
    ],
];
