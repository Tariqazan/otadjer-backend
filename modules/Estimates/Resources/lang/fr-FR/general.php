<?php

return [

    'estimates'        => 'Devis|Devis',
    'estimate_summary' => 'Résumé de l estimation',
    'description'      => 'Transformez un devis en facture de vente en un clic.',
    'estimate_number'  => 'Devis N°',
    'estimate_date'    => 'Date du devis',
    'total_price'      => 'Prix total',
    'expiry_date'      => 'Date d échéance',
    'bill_to'          => 'Facturer à',

    'empty' => [
        'estimates' => 'Transformez une estimation (devis) approuvé(e) en une facture en un seul clic de bouton.',
    ],

    'quantity'  => 'Quantité',
    'price'     => 'Prix',
    'sub_total' => 'Sous-total',
    'discount'  => 'Remise',
    'tax_total' => 'Total TVA',
    'total'     => 'Total',

    'item_name' => 'Article|Articles',

    'show_discount' => ':discount% de remise',
    'add_discount'  => 'Ajouter une remise',
    'discount_desc' => 'du sous-total',

    'convert_to_invoice'       => 'Convertir en facture',
    'converted_to_invoice'     => 'Converti en facture :invoice_number',
    'convert_to_sales_order'   => 'Convertir en ordre de vente',
    'converted_to_sales_order' => 'Converti en commande de vente :document_number',
    'created_from_estimate'    => 'Créé à partir de :type :estimate_number',
    'histories'                => 'Historique',
    'mark_sent'                => 'Marquer comme envoyé',
    'mark_approved_or_refused' => 'Approuver ou refuser le devis',
    'mark_approved'            => 'Marquer comme approuvé',
    'mark_refused'             => 'Marquer comme refusé',
    'download_pdf'             => 'Télécharger en PDF',
    'send_mail'                => 'Envoyer par Email',
    'create_estimate'          => 'Création devis',
    'send_estimate'            => 'Envoyer un devis',
    'approve'                  => 'Approuver',
    'refuse'                   => 'Refuser',
    'share'                    => 'Partager',
    'all_estimates'            => 'Authentifiez-vous pour voir tous les devis',

    'messages' => [
        'marked_sent'      => 'Devis marqué comme envoyé!',
        'marked_approved'  => 'Devis marqué comme approuvé!',
        'marked_refused'   => 'Devis marqué comme refusé!',
        'email_required'   => 'Pas d adresse email pour ce client!',
        'expired_estimate' => 'Une Offre expirée ne peut pas être modifiée!',

        'status' => [
            'created'      => 'Créé le :date',
            'viewed'       => 'Vu',
            'sent'         => [
                'draft' => 'Non envoyé',
                'sent'  => 'Envoyé le :date',
            ],
            'invoiced'     => 'Facturé',
            'not_invoiced' => 'Non facturé',
            'approved'     => 'Approuvé',
            'refused'      => 'Refusé',
            'await_action' => 'En attente d action du contact',
        ],
    ],
];
