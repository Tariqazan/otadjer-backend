<?php

return [

    'estimates'       => 'تخمین',
    'description'     => 'با فقط یکبار کلیک یک برآورد تایید شده را به فاکتور تبدیل کنید.',
    'estimate_number' => 'شماره تخمینی',
    'estimate_date'   => 'تاریخ تقریبی',
    'total_price'     => 'قیمت کل',
    'expiry_date'     => 'تاریخ انقضا',
    'bill_to'         => 'صورتحساب برای',

    'quantity'  => 'تعداد',
    'price'     => 'قيمت',
    'sub_total' => 'جمع کل',
    'discount'  => 'تخفیف',
    'tax_total' => 'مجموع مالیات',
    'total'     => 'جمع کل',

    'item_name' => 'نام آیتم | نام آیتم ها',

    'show_discount' => ':discount% تخفیف',
    'add_discount'  => 'افزودن تخفیف',
    'discount_desc' => 'از جمع کل',

    'convert_to_invoice'       => 'تبدیل به فاکتور',
    'converted_to_invoice'     => 'تبدیل به فاکتور :invoice_number',
    'created_from_estimate'    => 'فرم ساخته شده :type :estimate_number',
    'histories'                => 'تاریخچه',
    'mark_sent'                => 'علامت‌گذاری به عنوان ارسال شده',
    'mark_approved_or_refused' => 'تأیید یا رد تخمین',
    'mark_approved'            => 'علامت گذاری به عنوان تایید شده',
    'mark_refused'             => 'علامت گذاری به عنوان رد شده',
    'download_pdf'             => 'دانلود پی دی اف',
    'send_mail'                => 'ارسال ایمیل',
    'create_estimate'          => 'برآورد قیمت',
    'send_estimate'            => 'ارسال برآورد',
    'approve'                  => 'تایید',
    'refuse'                   => 'رد',
    'share'                    => 'اشتراک گذاری',
    'all_estimates'            => 'برای مشاهده همه تخمین ها وارد شوید',

    'statuses' => [
        'draft'    => 'پیش‌نویس',
        'sent'     => 'ارسال',
        'expired'  => 'منقضی شده',
        'viewed'   => 'مشاهده شده',
        'approved' => 'تایید شده',
        'refused'  => 'رد شده',
        'invoiced' => 'فاکتور شده',
    ],

    'messages' => [
        'email_sent'       => 'ایمیل تخمینی ارسال شده است!',
        'marked_sent'      => 'تخمین علامت گذاری شده ارسال شد!',
        'marked_approved'  => 'تخمین علامت گذاری شده تایید شد!',
        'marked_refused'   => 'تخمین علامت گذاری شده رد شد!',
        'email_required'   => 'برای مشتری ایمیل ثبت نشده است!',
        'expired_estimate' => 'برآورد منقضی شده قابل تغییر نیست!',

        'status' => [
            'created'      => 'تاریخ ایجاد',
            'viewed'       => 'مشاهده شده',
            'sent'         => [
                'draft' => 'ارسال نشده',
                'sent'  => 'ارسال شده در :date',
            ],
            'invoiced'     => 'فاکتور شده',
            'not_invoiced' => 'فاکتور نشده',
            'approved'     => 'تایید شده',
            'refused'      => 'رد شده',
            'await_action' => 'در انتظار اقدام مخاطب',
        ],
    ],
];
