<?php

return [

    'estimates'        => 'Angebot|Angebote',
    'estimate_summary' => 'Zusammenfassung aller Angebote',
    'description'      => 'Generieren Sie für ein zugesagtes Angebot mit nur einem Klick eine Rechnung.',
    'estimate_number'  => 'Angebotsnummer',
    'estimate_date'    => 'Angebotsdatum',
    'total_price'      => 'Gesamtpreis',
    'expiry_date'      => 'Gültigkeitsdatum',
    'bill_to'          => 'Angebot an',

    'empty' => [
        'estimates' => 'Generieren Sie für ein zugesagtes Angebot mit nur einem Klick eine Rechnung.',
    ],

    'quantity'  => 'Menge',
    'price'     => 'Preis',
    'sub_total' => 'Zwischensumme',
    'discount'  => 'Rabatt',
    'tax_total' => 'Steuern Total',
    'total'     => 'Total',

    'item_name' => 'Artikelname|Artikelnamen',

    'show_discount' => ':discount% Rabatt',
    'add_discount'  => 'Rabatt hinzufügen',
    'discount_desc' => 'Zwischensumme',

    'convert_to_invoice'       => 'Angebot in eine Rechnung umwandeln',
    'converted_to_invoice'     => 'Angebot wurde in die Rechnung :invoice_number umgewandelt',
    'convert_to_sales_order'   => 'Angebot in eine Rechnung umwandeln',
    'converted_to_sales_order' => 'Angebot wurde in die Rechnung :document_number umgewandelt',
    'created_from_estimate'    => 'Erstellt von :type :estimate_number',
    'histories'                => 'Historie',
    'mark_sent'                => 'Als gesendet markieren',
    'mark_approved_or_refused' => 'Angebot zusagen oder ablehnen',
    'mark_approved'            => 'Angebot bestätigt',
    'mark_refused'             => 'Angebot abgelehnt',
    'download_pdf'             => 'Als PDF herunterladen',
    'send_mail'                => 'E-Mail senden',
    'create_estimate'          => 'Angebot erstellen',
    'send_estimate'            => 'Angebot senden',
    'approve'                  => 'Bestätigt',
    'refuse'                   => 'Abgelehnt',
    'share'                    => 'Freigeben',
    'all_estimates'            => 'Melden Sie sich an, um alle Angebote anzuzeigen',

    'messages' => [
        'marked_sent'      => 'Angebot als <strong>gesendet</strong> markiert!',
        'marked_approved'  => 'Angebot als <strong>zugesagt</strong> markiert!',
        'marked_refused'   => 'Angebot als <strong>abgelehnt</strong> markiert!',
        'email_required'   => 'Es existiert keine E-Mailadresse zu diesem Kunden!',
        'expired_estimate' => 'Abgelaufenes Angebot kann nicht geändert werden!',

        'status' => [
            'created'      => 'Erstellt am :date',
            'viewed'       => 'Gelesen',
            'sent'         => [
                'draft' => 'Nicht gesendet',
                'sent'  => 'Gesendet am :date',
            ],
            'invoiced'     => 'In Rechnung gestellt',
            'not_invoiced' => 'Nicht abgerechnet',
            'approved'     => 'Zugesagt',
            'refused'      => 'Abgelehnt',
            'await_action' => 'Warten auf Kunde',
        ],
    ],
];
