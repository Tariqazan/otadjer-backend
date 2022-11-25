<?php

return [

    'name'              => 'Baris Kustom',
    'description'       => 'Tambahkan baris kustom yang tidak terbatas ke halaman yang berbeda',

    'fields'            => 'Baris',
    'locations'         => 'Lokasi',
    'sort'              => 'Urutkan',
    'order'             => 'Posisi',
    'depend'            => 'Tergantung',
    'show'              => 'Tampilkan',

    'form' => [
        'name'          => 'Nama',
        'code'          => 'Kode',
        'icon'          => 'Ikon FontAwesome',
        'class'         => 'CSS Class',
        'required'      => 'Diperlukan',
        'rule'          => 'Validasi',
        'before'        => 'Sebelum',
        'after'         => 'Sesudah',
        'value'         => 'Nilai',
        'shows'         => [
            'always'    => 'Selalu',
            'never'     => 'Tidak pernah',
            'if_filled' => 'Jika Diisi'
        ],
        'items'         => 'Item',
    ],

    'type' => [
        'select'        => 'Pilih',
        'radio'         => 'Radio',
        'checkbox'      => 'Kotak centang',
        'text'          => 'Teks',
        'textarea'      => 'Bidang Teks',
        'date'          => 'Tanggal',
        'time'          => 'Waktu',
        'date&time'     => 'Tanggal & Waktu',
        'enabled'     => 'Diaktifkan',
    ],

    'item' => [
        'action'   => 'Tindakan',
        'name'     => 'Nama Barang',
        'quantity' => 'Kuantitas Barang',
        'price'    => 'Harga Barang',
        'taxes'    => 'Pajak Barang',
        'total'    => 'Total Barang',
    ],
];
