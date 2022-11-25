<?php

return [
    'description'                => 'Personnaliser le préfixe de bon de commande, numéro, termes, pied de page, etc',
    'invoice_number'             => 'Numéro de bon de commande',
    'vendors'                    => 'Fournisseur|Fournisseurs',
    'invoice_date'               => 'Date de la commande',
    'expected_delivery_date'     => 'Date de livraison prévue',
    'order_number'               => 'Référence',
    'create_purchase_order'      => 'Créer un bon de commande',
    'send_invoice'               => 'Envoyer un bon de commande',
    'amount_due'                 => 'Montant',
    'confirm_purchase_orders'    => 'Confirmer le bon de commande',
    'mark_issued'                => 'Marquer comme délivré',
    'convert_to_bill'            => 'Convertir en facture',
    'summary_report_type'        => 'Récapitulatif du bon de commande',
    'summary_report_description' => 'Récapitulatif mensuel des bons de commande par fournisseurs',
    'messages'                   => [
        'draft' => 'Ceci est un bon de commande <b>DRAFT</b> et sera reflété dans les graphiques une fois qu\'il aura été envoyé.',
    ],
    'statuses'                   => [
        'draft'      => 'Brouillon',
        'sent'       => 'Envoyé',
        'billed'     => 'Facturé',
        'not_billed' => 'Non facturé',
        'issued'     => 'Délivré',
        'not_issued' => 'Non émis',
        'cancelled'  => 'Annulé',
    ],
];
