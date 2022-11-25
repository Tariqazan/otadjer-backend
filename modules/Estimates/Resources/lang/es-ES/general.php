<?php

return [

    'estimates'        => 'Presupuesto|Presupuestos',
    'estimate_summary' => 'Resumen presupuesto',
    'description'      => 'Convertir un presupuesto (quote) aprobado a una factura sólo con un clic.',
    'estimate_number'  => 'Número de Presupuesto',
    'estimate_date'    => 'Fecha de Presupuesto',
    'total_price'      => 'Precio Total',
    'expiry_date'      => 'Fecha de expiración',
    'bill_to'          => 'Facturar a',

    'empty' => [
        'estimates' => 'Convertir un presupuesto (quote) aprobado a una factura sólo con un clic.',
    ],

    'quantity'  => 'Cantidad',
    'price'     => 'Precio',
    'sub_total' => 'Subtotal',
    'discount'  => 'Descuento',
    'tax_total' => 'Total Impuestos',
    'total'     => 'Total ',

    'item_name' => 'Nombre del artículo | Nombres de artículo',

    'show_discount' => ':discount% Descuento',
    'add_discount'  => 'Añadir descuento',
    'discount_desc' => 'del subtotal',

    'convert_to_invoice'       => 'Convertir a Factura',
    'converted_to_invoice'     => 'Convertido a factura :document_number',
    'convert_to_sales_order'   => 'Convertir a pedido',
    'converted_to_sales_order' => 'Convertido a pedido :document_number',
    'created_from_estimate'    => 'Creado a partir de :type :document_number',
    'histories'                => 'Historial',
    'mark_sent'                => 'Marcar Como Enviado',
    'mark_approved_or_refused' => 'Aprobar o rechazar Presupuesto',
    'mark_approved'            => 'Marcar Aprobado',
    'mark_refused'             => 'Marca Rechazado',
    'download_pdf'             => 'Descargar PDF',
    'send_mail'                => 'Enviar Email',
    'create_estimate'          => 'Crear Presupuesto',
    'send_estimate'            => 'Enviar Presupuesto',
    'approve'                  => 'Aprobar',
    'refuse'                   => 'Rechazar',
    'share'                    => 'Compartir',
    'all_estimates'            => 'Inicie sesión para ver todos los presupuestos',

    'messages' => [
        'marked_sent'      => '¡Presupuesto marcado como enviado!',
        'marked_approved'  => '¡Presupuesto marcado como aprobado!',
        'marked_refused'   => '¡Presupuesto marcado como rechazado!',
        'email_required'   => 'Ninguna dirección de correo electrónico para este cliente!',
        'expired_estimate' => '¡Un presupuesto expirado no puede ser modificado!',

        'status' => [
            'created'      => 'Creado el :date',
            'viewed'       => 'Visto',
            'sent'         => [
                'draft' => 'No enviado',
                'sent'  => 'Enviado el :date',
            ],
            'invoiced'     => 'Facturado',
            'not_invoiced' => 'No facturado',
            'approved'     => 'Aprobado',
            'refused'      => 'Rechazado',
            'await_action' => 'Esperando la acción del contacto',
        ],
    ],
];
