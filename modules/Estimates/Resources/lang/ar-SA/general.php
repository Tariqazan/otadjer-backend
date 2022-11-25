<?php

return [

    'estimates'       => 'التقدير | التقديرات',
    'description'     => 'حوّل تقدير مُوَافق عليه (الاقتباس) إلى فاتورة بنقرة واحدة فقط على زر.',
    'estimate_number' => 'رقم التقدير',
    'estimate_date'   => 'تاريخ التقدير',
    'total_price'     => 'السعر الإجمالي',
    'expiry_date'     => 'تاريخ انتهاء الصلاحية',
    'bill_to'         => 'فاتورة إلى',

    'quantity'  => 'الكمية',
    'price'     => 'السعر',
    'sub_total' => 'المجموع الجزئي',
    'discount'  => 'الخصم',
    'tax_total' => 'إجمالي الضريبة',
    'total'     => 'المجموع',

    'item_name' => 'اسم العنصر | أسماء العناصر',

    'show_discount' => 'خصم :discount%',
    'add_discount'  => 'إضافة خصم',
    'discount_desc' => 'من المجموع الجزئي',

    'convert_to_invoice'       => 'التحويل الى فاتورة',
    'converted_to_invoice'     => 'تم التحويل الى فاتورة :invoice_number',
    'created_from_estimate'    => 'تم الانشاء من :type :estimate_number',
    'histories'                => 'سجلات',
    'mark_sent'                => 'التحديد كمرسل',
    'mark_approved_or_refused' => 'الموافقة أو الرفض للتقدير',
    'mark_approved'            => 'علامة كموافق',
    'mark_refused'             => 'علامة كمرفوض',
    'download_pdf'             => 'تحميل PDF',
    'send_mail'                => 'إرسال بريد إلكتروني',
    'create_estimate'          => 'إنشاء التقدير',
    'send_estimate'            => 'إرسال تقدير',
    'approve'                  => 'موافقة',
    'refuse'                   => 'رفض',
    'share'                    => 'شارك',
    'all_estimates'            => 'تسجيل الدخول لعرض جميع التقديرات',

    'statuses' => [
        'draft'    => 'مسودة',
        'sent'     => 'تم الإرسال',
        'expired'  => 'منتهية الصلاحية',
        'viewed'   => 'شوهد',
        'approved' => 'تمت الموافقة',
        'refused'  => 'مرفوض',
        'invoiced' => 'تمت فَوتَرَتُه',
    ],

    'messages' => [
        'email_sent'       => 'تم إرسال البريد الإلكتروني الخاص بالتقدير!',
        'marked_sent'      => 'التقدير عُلٍمَ كمرسل!',
        'marked_approved'  => 'التقدير عُلٍمَ كموافق عليه!',
        'marked_refused'   => 'التقدير عُلٍمَ كمرفوض!',
        'email_required'   => 'لا يوجد بريد إلكتروني لهذا العميل!',
        'expired_estimate' => 'لا يمكن تغيير تقدير منتهي!',

        'status' => [
            'created'      => 'تم الإنشاء في :date',
            'viewed'       => 'شوهد',
            'sent'         => [
                'draft' => 'لم يُرسل',
                'sent'  => 'تم الإرسال في :date',
            ],
            'invoiced'     => 'تمت فَوتَرَتُه',
            'not_invoiced' => 'لم تتم فَوتَرَته',
            'approved'     => 'تم الموافقة عليه',
            'refused'      => 'تم رفضه',
            'await_action' => 'في انتظار عمل الاتصال',
        ],
    ],
];
