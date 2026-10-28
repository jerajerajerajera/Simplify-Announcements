<?php

return [
    'title' => 'Pengumuman',
    'model' => 'pengumuman',
    'addon' => [
        'name' => 'Pengumuman',
        'description' => 'Pesan info, peringatan, dan sukses di bagian atas setiap halaman.',
    ],
    'form' => [
        'category' => 'Kategori',
        'title' => 'Judul',
        'body' => 'Pesan',
        'starts_at' => 'Tampilkan mulai',
        'starts_at_help' => 'Kosong: langsung. Waktu dalam :zone, zona waktu profilmu.',
        'ends_at' => 'Tampilkan sampai',
        'ends_at_help' => 'Kosong: sampai kamu mengakhirinya.',
        'audience' => 'Siapa yang melihat',
        'button_url' => 'Tautan tombol',
        'button_url_placeholder' => 'https://… atau /server/abc123',
        'button_url_invalid' => 'Gunakan tautan yang diawali https:// atau / untuk halaman panel ini.',
        'button_label' => 'Teks tombol',
        'in_bell' => 'Masukkan juga ke notifikasi semua orang',
        'in_bell_help' => 'Semua yang melihatnya juga menemukannya di lonceng, dari mulai sampai berakhir.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Peringatan',
        'success' => 'Sukses',
    ],
    'audience' => [
        'everyone' => 'Semua orang',
        'admins' => 'Hanya admin',
    ],
    'state' => [
        'live' => 'Aktif',
        'scheduled' => 'Terjadwal',
        'ended' => 'Berakhir',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Langsung',
        'until_ended' => 'Sampai diakhiri',
        'end' => 'Akhiri sekarang',
        'end_heading' => 'Akhiri pengumuman ini sekarang?',
        'end_help' => 'Barnya hilang untuk semua orang. Kamu bisa menampilkannya lagi dengan mengubah "Tampilkan sampai".',
        'empty' => 'Belum ada pengumuman',
        'empty_help' => 'Pengumuman tampil sebagai bar di bagian atas setiap halaman untuk orang yang kamu pilih.',
        'in_bell' => 'Notifikasi',
        'in_bell_sent' => 'Terkirim',
        'in_bell_waiting' => 'Menunggu mulai',
    ],
    'bars' => [
        'open' => 'Buka',
        'until' => 'Sampai',
        'unpin' => 'Lepas sematan',
        'pin_again' => 'Sematkan lagi',
    ],
];
