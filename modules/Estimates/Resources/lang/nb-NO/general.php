<?php

return [

    'estimates'       => 'Tilbud|Tilbud',
    'description'     => 'Gjør et godkjent tilbud om til en faktura på et tastetrykk.',
    'estimate_number' => 'Tilbudsnummer',
    'estimate_date'   => 'Tilbudsdato',
    'total_price'     => 'Total pris',
    'expiry_date'     => 'Utløpsdato',
    'bill_to'         => 'Faktura til',

    'quantity'  => 'Antall',
    'price'     => 'Pris',
    'sub_total' => 'Subtotal',
    'discount'  => 'Rabatt',
    'tax_total' => 'Total MVA',
    'total'     => 'Totalt',

    'item_name' => 'Artikkelnavn|Artikkelnavn',

    'show_discount' => ':discount% rabatt',
    'add_discount'  => 'Legg til rabatt',
    'discount_desc' => 'av subtotal',

    'convert_to_invoice'       => 'Konverter til faktura',
    'converted_to_invoice'     => 'Konvertert til faktura :invoice_number',
    'created_from_estimate'    => 'Opprettet fra :type :estimate_number',
    'histories'                => 'Historie',
    'mark_sent'                => 'Merk som sendt',
    'mark_approved_or_refused' => 'Godkjenn eller avvis tilbud',
    'mark_approved'            => 'Merk som godkjent',
    'mark_refused'             => 'Merk som avvist',
    'download_pdf'             => 'Last ned PDF',
    'send_mail'                => 'Send e-post',
    'create_estimate'          => 'Opprett tilbud',
    'send_estimate'            => 'Send tilbud',
    'approve'                  => 'Godkjenn',
    'refuse'                   => 'Avvis',
    'share'                    => 'Del',
    'all_estimates'            => 'Logg inn for å se alle tilbud',

    'statuses' => [
        'draft'    => 'Kladd',
        'sent'     => 'Sendt',
        'expired'  => 'Utløpt',
        'viewed'   => 'Sett',
        'approved' => 'Godkjent',
        'refused'  => 'Avvist',
        'invoiced' => 'Fakturert',
    ],

    'messages' => [
        'email_sent'       => 'E-post med tilbud er blitt sendt!',
        'marked_sent'      => 'Tilbud merket som sendt!',
        'marked_approved'  => 'Tilbud merket som godkjent!',
        'marked_refused'   => 'Tilbud merket som avvist!',
        'email_required'   => 'Ingen e-postadresse registrert for denne kunden!',
        'expired_estimate' => 'Utløpt tilbud kan ikke endres!',

        'status' => [
            'created'      => 'Opprettet :date',
            'viewed'       => 'Sett',
            'sent'         => [
                'draft' => 'Ikke sendt',
                'sent'  => 'Sendt :date',
            ],
            'invoiced'     => 'Fakturert',
            'not_invoiced' => 'Ikke fakturert',
            'approved'     => 'Godkjent',
            'refused'      => 'Avvist',
            'await_action' => 'Avventer mottakers handling',
        ],
    ],
];
