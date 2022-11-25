<?php

return [
    'description'                => 'Customize purchase order prefix, number, terms, footer etc',
    'invoice_number'             => 'Purchase Order Number',
    'vendors'                    => 'Vendor|Vendors',
    'invoice_date'               => 'Purchase Order Date',
    'expected_delivery_date'     => 'Expected Delivery Date',
    'order_number'               => 'Reference',
    'create_purchase_order'      => 'Create Purchase Order',
    'send_invoice'               => 'Send Purchase Order',
    'amount_due'                 => 'Amount',
    'confirm_purchase_orders'    => 'Confirm Purchase Order',
    'mark_issued'                => 'Mark Issued',
    'convert_to_bill'            => 'Convert to Bill',
    'summary_report_type'        => 'Purchase Order Summary',
    'summary_report_description' => 'Monthly purchase order summary by vendors',
    'messages'                   => [
        'draft' => 'This is a <b>DRAFT</b> purchase order and will be reflected to charts after it gets sent.',
    ],
    'statuses'                   => [
        'draft'      => 'Draft',
        'sent'       => 'Sent',
        'billed'     => 'Billed',
        'not_billed' => 'Not billed',
        'issued'     => 'Issued',
        'not_issued' => 'Not issued',
        'cancelled'  => 'Cancelled',
    ],
];
