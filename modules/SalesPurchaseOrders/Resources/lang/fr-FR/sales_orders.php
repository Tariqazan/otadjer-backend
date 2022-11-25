<?php

return [
    'description'                => 'Personnaliser le préfixe de bon de commande, numéro, termes, pied de page, etc',
    'invoice_number'             => 'Bon de commande N°',
    'invoice_date'               => 'Date de la commande',
    'expected_shipment_date'     => 'Date d\'expédition prévue',
    'order_number'               => 'Référence',
    'create_sales_order'         => 'Créer un bon de commande',
    'send_invoice'               => 'Envoyer un bon de commande',
    'amount_due'                 => 'Montant',
    'confirm_sales_orders'       => 'Confirmer le bon commande',
    'mark_confirmed'             => 'Marquer comme confirmé',
    'convert_to_invoice'         => 'Convertir en facture',
    'convert_to_purchase_order'  => 'Convertir en bon de commande',
    'summary_report_type'        => 'Récapitulatif des bons de commande',
    'summary_report_description' => 'Récapitulatif mensuel des commandes client par client',
    'messages'                   => [
        'draft' => 'Ceci est un bon de commande <b>DRAFT</b> et sera reflété dans les graphiques après avoir été envoyé.',
    ],
    'statuses'                   => [
        'draft'         => 'Brouillon',
        'sent'          => 'Envoyé',
        'invoiced'      => 'Facturé',
        'not_invoiced'  => 'Non facturé',
        'confirmed'     => 'Confirmé',
        'not_confirmed' => 'Non confirmé',
        'cancelled'     => 'Annulé',
    ],
];
