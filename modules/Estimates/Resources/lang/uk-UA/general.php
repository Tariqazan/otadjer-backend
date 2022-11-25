<?php

return [

    'estimates'       => 'Оцінка|Оцінки',
    'description'     => 'Перетворіть затверджений кошторис (котирування) у рахунок-фактуру лише одним кліком.',
    'estimate_number' => 'Розрахункове число',
    'estimate_date'   => 'Розрахункова дата',
    'total_price'     => 'Загальна ціна',
    'expiry_date'     => 'Дійсний до',
    'bill_to'         => 'Рахунок до',

    'quantity'  => 'К-ть',
    'price'     => 'Ціна',
    'sub_total' => 'Сума',
    'discount'  => 'Знижка',
    'tax_total' => 'Всього пдв',
    'total'     => 'Разом',

    'item_name' => 'Назва товару|Назви товарів',

    'show_discount' => ':discount% Знижка',
    'add_discount'  => 'Додати знижку',
    'discount_desc' => 'з суми',

    'convert_to_invoice'       => 'Конвертувати в рахунок',
    'converted_to_invoice'     => 'Конвертувати в рахунок :invoice_number',
    'created_from_estimate'    => 'Створено з :type :estimate_number',
    'histories'                => 'Історії',
    'mark_sent'                => 'Позначити відправленим',
    'mark_approved_or_refused' => 'Затвердити або відмовитися від оцінки',
    'mark_approved'            => 'Позначити Затвердженим',
    'mark_refused'             => 'Позначити Відхиленим',
    'download_pdf'             => 'Завантажити PDF',
    'send_mail'                => 'Надіслати листа',
    'create_estimate'          => 'Створити оцінку',
    'send_estimate'            => 'Надіслати Розрахунок',
    'approve'                  => 'Підтвердити',
    'refuse'                   => 'Відмовити',
    'share'                    => 'Поділитись',
    'all_estimates'            => 'Увійдіть, щоб переглянути всі розрахунки',

    'statuses' => [
        'draft'    => 'Чернетка',
        'sent'     => 'Надіслано',
        'expired'  => 'Протерміновано',
        'viewed'   => 'Переглянуто',
        'approved' => 'Затверджено',
        'refused'  => 'Відхилено',
        'invoiced' => 'Виставлено рахунок',
    ],

    'messages' => [
        'email_sent'       => 'Рахунок електронною поштою відправлено!',
        'marked_sent'      => 'Рахунок позначено як відправлений!',
        'marked_approved'  => 'Рахунок позначено як відправлений!',
        'marked_refused'   => 'Рахунок позначено як відправлений!',
        'email_required'   => 'Немає електронної адреси цього клієнта!',
        'expired_estimate' => 'Затверджений підрахунок не можна змінити!',

        'status' => [
            'created'      => 'Створено :date',
            'viewed'       => 'Переглянуто',
            'sent'         => [
                'draft' => 'Не надіслано',
                'sent'  => 'Надіслано :date',
            ],
            'invoiced'     => 'Виставлено рахунок',
            'not_invoiced' => 'Не виставлено рахунки',
            'approved'     => 'Затверджено',
            'refused'      => 'Відхилено',
            'await_action' => 'Очікує на дію контакту',
        ],
    ],
];
