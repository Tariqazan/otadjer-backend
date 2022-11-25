<?php

return [

    'debit_note_number'           => 'Numéro de la note de débit',
    'document_number'             => 'Numéro de la note de débit',
    'debit_note_date'             => 'Date de la note de débit',
    'issued_at'                   => 'Date de la note de débit',
    'total_price'                 => 'Prix total',
    'issue_date'                  => 'Date d\'échéance',
    'related_bill_number'         => 'Numéro de facture',
    'debit_note_to'               => 'Note de débit à',
    'contact_info'                => 'Note de débit à',

    'quantity'                    => 'Quantité',
    'price'                       => 'Prix',
    'sub_total'                   => 'Sous-total',
    'discount'                    => 'Remise',
    'item_discount'               => 'Remise sur la ligne',
    'tax_total'                   => 'Total des taxes',
    'total'                       => 'Total',

    'item_name'                   => 'Nom de l’article|Noms des articles',

    'show_discount'               => ':discount% de réduction',
    'add_discount'                => 'Ajouter une remise',
    'discount_desc'               => 'du sous-total',

    'refund_from_vendor'          => 'Remboursement d\'un fournisseur',
    'received_refund_from_vendor' => 'Reçu :amount en tant que remboursement de :vendor',

    'histories'                   => 'Historiques',
    'type'                        => 'Type',
    'refund'                      => 'Remboursement',
    'mark_sent'                   => 'Marquer comme envoyé',
    'receive_refund'              => 'Recevoir un remboursement',
    'mark_viewed'                 => 'Marquer comme vu',
    'mark_cancelled'              => 'Marquer comme annulé',
    'download_pdf'                => 'Télécharger le PDF',
    'send_mail'                   => 'Envoyer un Email',
    'all_debit_notes'             => 'Connectez-vous pour voir toutes les notes de débit',
    'create_debit_note'           => 'Créer une note de débit',
    'send_debit_note'             => 'Envoyer une note de débit',
    'timeline_sent_title'         => 'Envoyer une note de débit',

    'statuses' => [
        'draft'     => 'Brouillon',
        'sent'      => 'Envoyé',
        'viewed'    => 'Vu',
        'cancelled' => 'Annulé',
    ],

    'messages' => [
        'email_sent'          => 'L\'e-mail de la note de débit a été envoyé !',
        'marked_viewed'       => 'Note de débit marquée comme vue !',
        'refund_was_received' => 'Remboursement a été reçu !',
        'email_required'      => 'Ce client ne possède pas d\'email !',
        'draft'               => 'Ceci est une note de débit de <b>DRAFT</b> et sera reflété dans les graphiques après avoir été envoyé.',

        'status' => [
            'created' => 'Créée le :date',
            'viewed'  => 'Vu',
            'send'    => [
                'draft' => 'Pas envoyée',
                'sent'  => 'Envoyée le :date',
            ],
        ],
    ],

];
