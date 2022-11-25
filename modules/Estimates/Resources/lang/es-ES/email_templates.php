<?php

return [
    'title'                    => 'Plantillas de Correo',
    'estimate_new_customer'    => [
        'subject' => 'Presupuesto {estimate_number} creado',
        'body'    => 'Estimado/a {customer_name},' .
                     '<br /><br />' .
                     'Hemos preparado el siguiente presupuesto para usted: ' .
                     '<strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Puede ver los detalles del presupuesto desde el siguiente enlace: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Si tiene alguna duda, no dude en contactar con nosotros.' .
                     '<br /><br />' .
                     'Atentamente,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_customer' => [
        'subject' => '{estimate_number} aviso de recordatorio de presupuesto',
        'body'    => 'Estimado/a {customer_name},' .
                     '<br /><br />' .
                     'Este es un aviso de recordatorio para el presupuesto <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'El total del presupuesto es {estimate_total} y expirará el <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Puede ver los detalles del presupuesto desde el siguiente enlace: ' .
                     '<a href="{estimate_guest_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Atentamente,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_remind_admin'    => [
        'subject' => '{estimate_number} aviso de recordatorio de presupuesto',
        'body'    => 'Hola,' .
                     '<br /><br />' .
                     'Este es un aviso de recordatorio para el presupuesto <strong>{estimate_number}</strong> de {customer_name}.'
                     .
                     '<br /><br />' .
                     'El total del presupuesto es {estimate_total} y expirará el <strong>{estimate_expiry_date}</strong>.'
                     .
                     '<br /><br />' .
                     'Puede ver los detalles del presupuesto desde el siguiente enlace: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Atentamente,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_approved_admin'  => [
        'subject' => 'Presupuesto {estimate_number} aprobado',
        'body'    => 'Hola,' .
                     '<br /><br />' .
                     '{customer_name} aprobó el presupuesto <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Puede ver los detalles del presupuesto desde el siguiente enlace: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Atentamente,' .
                     '<br />' .
                     '{company_name}',
    ],
    'estimate_refused_admin'   => [
        'subject' => 'Presupuesto {estimate_number} rechazado',
        'body'    => 'Hola,' .
                     '<br /><br />' .
                     '{customer_name} rechazó el presupuesto <strong>{estimate_number}</strong>.' .
                     '<br /><br />' .
                     'Puede ver los detalles del presupuesto desde el siguiente enlace: ' .
                     '<a href="{estimate_admin_link}">{estimate_number}</a>.' .
                     '<br /><br />' .
                     'Atentamente,' .
                     '<br />' .
                     '{company_name}',
    ],

];
