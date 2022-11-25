<?php

return [

    'estimates'        => 'Estimate|Estimates',
    'estimate_summary' => 'Estimate Summary',
    'description'      => 'Turn an approved estimate (quote) into an invoice with just one click of a button.',
    'estimate_number'  => 'Estimate Number',
    'estimate_date'    => 'Estimate Date',
    'total_price'      => 'Total Price',
    'expiry_date'      => 'Expiry Date',
    'bill_to'          => 'Bill To',

    'empty' => [
        'estimates' => 'Turn an approved estimate (quote) into an invoice with just one click of a button.',
    ],

    'quantity'  => 'Quantity',
    'price'     => 'Price',
    'sub_total' => 'Subtotal',
    'discount'  => 'Discount',
    'tax_total' => 'Tax Total',
    'total'     => 'Total',

    'item_name' => 'Item Name|Item Names',

    'show_discount' => ':discount% Discount',
    'add_discount'  => 'Add Discount',
    'discount_desc' => 'of subtotal',

    'convert_to_invoice'       => 'Convert to Invoice',
    'converted_to_invoice'     => 'Converted to invoice :document_number',
    'convert_to_sales_order'   => 'Convert to Sales Order',
    'converted_to_sales_order' => 'Converted to sales order :document_number',
    'created_from_estimate'    => 'Created from :type :document_number',
    'histories'                => 'Histories',
    'mark_sent'                => 'Mark Sent',
    'mark_approved_or_refused' => 'Approve or Refuse Estimate',
    'mark_approved'            => 'Mark Approved',
    'mark_refused'             => 'Mark Refused',
    'download_pdf'             => 'Download PDF',
    'send_mail'                => 'Send Email',
    'create_estimate'          => 'Create Estimate',
    'send_estimate'            => 'Send Estimate',
    'approve'                  => 'Approve',
    'refuse'                   => 'Refuse',
    'share'                    => 'Share',
    'all_estimates'            => 'Login to view all estimates',

    'messages' => [
        'marked_sent'      => 'Estimate marked as sent!',
        'marked_approved'  => 'Estimate marked as approved!',
        'marked_refused'   => 'Estimate marked as refused!',
        'email_required'   => 'No email address for this customer!',
        'expired_estimate' => 'Expired estimate can not be changed!',

        'status' => [
            'created'      => 'Created on :date',
            'viewed'       => 'Viewed',
            'sent'         => [
                'draft' => 'Not sent',
                'sent'  => 'Sent on :date',
            ],
            'invoiced'     => 'Invoiced',
            'not_invoiced' => 'Not invoiced',
            'approved'     => 'Approved',
            'refused'      => 'Refused',
            'await_action' => 'Awaiting contact\'s action',
        ],
    ],
];
