<?php

return [

    'estimates'        => 'Teklif|Teklif',
    'estimate_summary' => 'Teklif Özeti',
    'description'      => 'Onaylanmış bir teklifi (fiyat teklifi) tek bir düğmeye basarak faturaya dönüştürün.',
    'estimate_number'  => 'Teklif Numarası',
    'estimate_date'    => 'Teklif Tarihi',
    'total_price'      => 'Toplam Fiyat',
    'expiry_date'      => 'Son Geçerlilik Tarihi',
    'bill_to'          => 'Faturalama Yeri',

    'empty' => [
        'estimates' => 'Onaylanmış bir teklifi (fiyat teklifi) tek bir düğmeye basarak faturaya dönüştürün.',
    ],

    'quantity'  => 'Miktar',
    'price'     => 'Fiyat',
    'sub_total' => 'Ara Toplam',
    'discount'  => 'İskonto',
    'tax_total' => 'Vergi Toplamı',
    'total'     => 'Toplam',

    'item_name' => 'Ürün Adı|Ürün Adları',

    'show_discount' => ':discount% İskonto',
    'add_discount'  => 'İskonto Ekle',
    'discount_desc' => 'ara toplam',

    'convert_to_invoice'       => 'Faturaya Dönüştür',
    'converted_to_invoice'     => 'Faturaya dönüştürüldü :document_number',
    'convert_to_sales_order'   => 'Satış Siparişine Dönüştür',
    'converted_to_sales_order' => 'Satış siparişine dönüştürüldü :document_number',
    'created_from_estimate'    => 'Oluşturan :type :document_number',
    'histories'                => 'Geçmiş',
    'mark_sent'                => 'Gönderildi Olarak İşaretle',
    'mark_approved_or_refused' => 'Teklifi Onaylama ve Reddetme',
    'mark_approved'            => 'Onaylandı Olarak İşaretle',
    'mark_refused'             => 'Reddedildi Olarak İşaretle',
    'download_pdf'             => 'PDF İndir',
    'send_mail'                => 'E-Posta Gönder',
    'create_estimate'          => 'Teklif Oluştur',
    'send_estimate'            => 'Teklif Gönder',
    'approve'                  => 'Onayla',
    'refuse'                   => 'Reddet',
    'share'                    => 'Paylaş',
    'all_estimates'            => 'Tüm teklifleri görmek için giriş yapın',

    'messages' => [
        'marked_sent'      => 'Teklif gönderildi olarak işaretle!',
        'marked_approved'  => 'Teklif onaylandı olarak işaretler!',
        'marked_refused'   => 'Teklif reddedildi olarak işaretle!',
        'email_required'   => 'Bu müşteri için e posta adresi yok!',
        'expired_estimate' => 'Süresi dolan teklif değiştirilemez!',

        'status' => [
            'created'      => 'Oluşturulma tarihi :date',
            'viewed'       => 'Görüntülendi',
            'sent'         => [
                'draft' => 'Gönderilmedi',
                'sent'  => 'Gönderilme tarihi :date',
            ],
            'invoiced'     => 'Faturalı',
            'not_invoiced' => 'Faturasız',
            'approved'     => 'Onaylandı',
            'refused'      => 'Reddedildi',
            'await_action' => 'Bağlantı eylemi bekleniyor',
        ],
    ],
];
