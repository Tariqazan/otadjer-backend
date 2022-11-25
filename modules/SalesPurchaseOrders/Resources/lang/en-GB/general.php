<?php

return [

    'name'                   => 'Sales&Purchase Orders',
    'description'            => 'Simplify online sales&purchase order management',
    'sales_orders'           => 'Sales Order|Sales Orders',
    'purchase_orders'        => 'Purchase Order|Purchase Orders',
    'purchase_order_summary' => 'Purchase Order Summary',
    'mark_sent'              => 'Mark Sent',
    'converted_to_document'  => 'Converted to :type :document_number',
    'created_from_document'  => 'Created from :type :document_number',
    'messages'               => [
        'marked_confirmed' => ':type marked as confirmed!',
        'marked_issued'    => ':type marked as issued!',
    ],
    'empty'                  => [
        'sales_orders'    => 'A Sales Order is a document sent to your customers confirming the items and prices of a sale.',
        'purchase_orders' => 'A Purchase Order is an official document that a buyer issues to a seller indicating information about the items they want to buy, their quantities, and their prices.',
    ],
];
