<?php

return [

    'name'                   => 'Ventes et bons de commande',
    'description'            => 'Simplifier la gestion des ventes et des commandes en ligne',
    'sales_orders'           => 'Commande client|Commandes clients',
    'purchase_orders'        => 'Bon de commande|Bons de commande',
    'purchase_order_summary' => 'Récapitulatif du bon de commande',
    'mark_sent'              => 'Marquer comme envoyé',
    'converted_to_document'  => 'Converti en :type :document_number',
    'created_from_document'  => 'Créé à partir de :type :document_number',
    'messages'               => [
        'marked_confirmed' => ':type marqué comme confirmé !',
        'marked_issued'    => ':type marqué comme émis !',
    ],
    'empty'                  => [
        'sales_orders'    => 'Un bon de commande est un document envoyé à vos clients confirmant les articles et les prix d\'une vente.',
        'purchase_orders' => 'Un bon de commande est un document officiel qu\'un acheteur délivre à un vendeur indiquant les informations sur les articles qu\'il souhaite acheter, leurs quantités et leurs prix.',
    ],
];
