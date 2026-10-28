<?php

return [
    'title' => 'Anunțuri',
    'model' => 'anunț',
    'addon' => [
        'name' => 'Anunțuri',
        'description' => 'Mesaje de informare, avertizare și succes în partea de sus a fiecărei pagini.',
    ],
    'form' => [
        'category' => 'Categorie',
        'title' => 'Titlu',
        'body' => 'Mesaj',
        'starts_at' => 'Afișează de la',
        'starts_at_help' => 'Gol: imediat. Ore în :zone, fusul orar din profilul tău.',
        'ends_at' => 'Afișează până la',
        'ends_at_help' => 'Gol: până îl închei.',
        'audience' => 'Cine îl vede',
        'button_url' => 'Link buton',
        'button_url_placeholder' => 'https://… sau /server/abc123',
        'button_url_invalid' => 'Folosește un link care începe cu https:// sau cu / pentru o pagină a acestui panou.',
        'button_label' => 'Text buton',
        'in_bell' => 'Pune și în notificările tuturor',
        'in_bell_help' => 'Oricine îl vede îl găsește și la clopoțel, de la început până la sfârșit.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Avertisment',
        'success' => 'Succes',
    ],
    'audience' => [
        'everyone' => 'Toată lumea',
        'admins' => 'Doar adminii',
    ],
    'state' => [
        'live' => 'Activ',
        'scheduled' => 'Programat',
        'ended' => 'Încheiat',
    ],
    'table' => [
        'state' => 'Stare',
        'right_away' => 'Imediat',
        'until_ended' => 'Până la încheiere',
        'end' => 'Încheie acum',
        'end_heading' => 'Închei acum acest anunț?',
        'end_help' => 'Bara dispare pentru toată lumea. Îl poți afișa din nou schimbând "Afișează până la".',
        'empty' => 'Încă nu există anunțuri',
        'empty_help' => 'Un anunț apare ca bară în partea de sus a fiecărei pagini pentru persoanele pe care le alegi.',
        'in_bell' => 'Notificări',
        'in_bell_sent' => 'Trimis',
        'in_bell_waiting' => 'Așteaptă începutul',
    ],
    'bars' => [
        'open' => 'Deschide',
        'until' => 'Până la',
        'unpin' => 'Detașează',
        'pin_again' => 'Fixează din nou',
    ],
];
