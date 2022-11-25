<?php

return [

    'credit_note_number'      => 'Numéro de l\'avoir',
    'document_number'         => 'Numéro de l\'avoir',
    'credit_note_date'        => 'Date de l\'avoir',
    'issued_at'               => 'Date de l\'avoir',
    'total_price'             => 'Prix total',
    'issue_date'              => 'Date d\'échéance',
    'related_invoice_number'  => 'Numéro de facture',
    'bill_to'                 => 'Facturer à',

    'quantity'                => 'Quantité',
    'price'                   => 'Prix',
    'sub_total'               => 'Sous-total',
    'discount'                => 'Remise',
    'item_discount'           => 'Remise sur la ligne',
    'tax_total'               => 'Total des taxes',
    'total'                   => 'Total',

    'item_name'               => 'Nom de l’article|Noms des articles',

    'credit_customer_account' => 'Créditer le compte client',
    'show_discount'           => ':discount % de remise',
    'add_discount'            => 'Ajouter une remise',
    'discount_desc'           => 'du sous-total',

    'customer_credited_with'  => ':customer crédité de :amount',
    'credit_cancelled'        => ':amount crédit annulé',
    'refunded_customer_with'  => 'Remboursé :customer de :amount',
    'refund_to_customer'      => 'Remboursement à un client',

    'histories'               => 'Historiques',
    'type'                    => 'Type',
    'credit'                  => 'Crédit',
    'refund'                  => 'Remboursement',
    'make_refund'             => 'Effectuer un remboursement',
    'mark_sent'               => 'Marquer comme envoyée',
    'mark_viewed'             => 'Marquer comme vu',
    'mark_cancelled'          => 'Marquer comme annulé',
    'download_pdf'            => 'Télécharger le PDF',
    'send_mail'               => 'Envoyer par Email',
    'all_credit_notes'        => 'Connectez-vous pour voir tous les avoirs',
    'create_credit_note'      => 'Créer un avoir',
    'send_credit_note'        => 'Envoyer un avoir',
    'timeline_sent_title'     => 'Envoyer un avoir',

    'statuses' => [
        'draft'     => 'Brouillon',
        'sent'      => 'Envoyé',
        'viewed'    => 'Vu',
        'approved'  => 'Approuvé',
        'partial'   => 'Partiel',
        'cancelled' => 'Annulé',
    ],

    'messages' => [
        'email_sent'       => 'L\'e-mail de l\'\'avoir a été envoyé !',
        'marked_sent'      => 'Avoir marqué comme envoyé !',
        'marked_viewed'    => 'Avoir marqué comme vu !',
        'marked_cancelled' => 'Avoir marqué comme annulé !',
        'refund_was_made'  => 'Remboursement effectué !',
        'email_required'   => 'Ce client ne possède pas d\'email !',
        'draft'            => 'Ceci est un avoir <b>DRAFT</b> et sera reflété dans les graphiques après avoir été envoyé.',

        'status' => [
            'created' => 'Créé le :date',
            'viewed'  => 'Consulté',
            'send'    => [
                'draft' => 'Non envoyé',
                'sent'  => 'Envoyé le :date',
            ],
        ],
    ],

];
