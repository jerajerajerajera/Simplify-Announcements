<?php

return [
    'title' => 'Duyurular',
    'model' => 'duyuru',
    'addon' => [
        'name' => 'Duyurular',
        'description' => 'Her sayfanın üstünde bilgi, uyarı ve başarı mesajları.',
    ],
    'form' => [
        'category' => 'Kategori',
        'title' => 'Başlık',
        'body' => 'Mesaj',
        'starts_at' => 'Gösterme başlangıcı',
        'starts_at_help' => 'Boş: hemen. Saatler :zone saat diliminde, profilindeki saat dilimi.',
        'ends_at' => 'Gösterme bitişi',
        'ends_at_help' => 'Boş: sen bitirene kadar.',
        'audience' => 'Kim görür',
        'button_url' => 'Düğme bağlantısı',
        'button_url_placeholder' => 'https://… veya /server/abc123',
        'button_url_invalid' => 'https:// ile ya da bu panelin bir sayfası için / ile başlayan bir bağlantı kullan.',
        'button_label' => 'Düğme metni',
    ],
    'category' => [
        'info' => 'Bilgi',
        'warning' => 'Uyarı',
        'success' => 'Başarılı',
    ],
    'audience' => [
        'everyone' => 'Herkes',
        'admins' => 'Yalnızca adminler',
    ],
    'state' => [
        'live' => 'Yayında',
        'scheduled' => 'Planlandı',
        'ended' => 'Bitti',
    ],
    'table' => [
        'state' => 'Durum',
        'right_away' => 'Hemen',
        'until_ended' => 'Bitirilene kadar',
        'end' => 'Şimdi bitir',
        'end_heading' => 'Bu duyuru şimdi bitirilsin mi?',
        'end_help' => 'Çubuğu herkes için kaybolur. "Gösterme bitişi"ni değiştirerek yeniden gösterebilirsin.',
        'empty' => 'Henüz duyuru yok',
        'empty_help' => 'Duyuru, seçtiğin kişiler için her sayfanın üstünde bir çubuk olarak görünür.',
    ],
    'bars' => [
        'open' => 'Aç',
        'until' => 'Bitiş:',
        'unpin' => 'Sabitlemeyi kaldır',
        'pin_again' => 'Yeniden sabitle',
    ],
];
