<?php

return [

    'estimates'        => 'Estimasi',
    'estimate_summary' => 'Perkiraan Estimasi',
    'description'      => 'Ganti sebuah estimasi yang disetujui (penawaran) kedalam sebuah faktur dengan hanya satu kali klik saja.',
    'estimate_number'  => 'Nomor Perkiraan',
    'estimate_date'    => 'Tanggal Perkiraan',
    'total_price'      => 'Total harga',
    'expiry_date'      => 'Tanggal kadaluarsa',
    'bill_to'          => 'Tagihan Kepada',

    'empty' => [
        'estimates' => 'Ganti sebuah estimasi yang disetujui (penawaran) kedalam sebuah faktur dengan hanya satu kali klik saja.',
    ],

    'quantity'  => 'Kuantitas',
    'price'     => 'Harga',
    'sub_total' => 'Subtotal',
    'discount'  => 'Diskon',
    'tax_total' => 'Total Pajak',
    'total'     => 'Total',

    'item_name' => 'Nama Item | Nama Item',

    'show_discount' => 'Diskon :discount%',
    'add_discount'  => 'Tambah Diskon',
    'discount_desc' => 'dari subtotal',

    'convert_to_invoice'       => 'Konversi ke Tagihan',
    'converted_to_invoice'     => 'Dikonversi kedalam faktur: :document_number',
    'convert_to_sales_order'   => 'Konversikan ke Pesanan Penjualan',
    'converted_to_sales_order' => 'Dikonversi kedalam pesanan penjualan: :document_number',
    'created_from_estimate'    => 'Dibuat dari :type :document_number',
    'histories'                => 'Sejarah',
    'mark_sent'                => 'Tandai Terkirim',
    'mark_approved_or_refused' => 'Setujui atau Tolak Estimasi',
    'mark_approved'            => 'Tandai Disetujui',
    'mark_refused'             => 'Tandai Ditolak',
    'download_pdf'             => 'Unduh PDF',
    'send_mail'                => 'Kirim Email',
    'create_estimate'          => 'Buat Estimasi',
    'send_estimate'            => 'Kirim Estimasi',
    'approve'                  => 'Setujui',
    'refuse'                   => 'Tolak',
    'share'                    => 'Bagikan',
    'all_estimates'            => 'Masuk untuk melihat seluruh estimasi',

    'messages' => [
        'marked_sent'      => 'Estimasi ditandai sebagai terkirim!',
        'marked_approved'  => 'Estimasi ditandai sebagai disetujui!',
        'marked_refused'   => 'Estimasi ditandai sebagai ditolak!',
        'email_required'   => 'Tidak ada alamat email untuk pelanggan ini!',
        'expired_estimate' => 'Estimasi yang telah berakhir tidak dapat diubah!',

        'status' => [
            'created'      => 'Dibuat pada :date',
            'viewed'       => 'Dilihat',
            'sent'         => [
                'draft' => 'Tidak terkirim',
                'sent'  => 'Terkirim pada :date',
            ],
            'invoiced'     => 'Tertagih',
            'not_invoiced' => 'Belum ditagih',
            'approved'     => 'Disetujui',
            'refused'      => 'Ditolak',
            'await_action' => 'Menunggu tindakan kontak',
        ],
    ],
];
