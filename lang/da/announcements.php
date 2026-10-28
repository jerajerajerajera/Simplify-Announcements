<?php

return [
    'title' => 'Meddelelser',
    'model' => 'meddelelse',
    'addon' => [
        'name' => 'Meddelelser',
        'description' => 'Info-, advarsels- og succesbeskeder øverst på hver side.',
    ],
    'form' => [
        'category' => 'Kategori',
        'title' => 'Titel',
        'body' => 'Besked',
        'starts_at' => 'Vis fra',
        'starts_at_help' => 'Tom: med det samme. Tider i :zone, tidszonen i din profil.',
        'ends_at' => 'Vis indtil',
        'ends_at_help' => 'Tom: indtil du afslutter den.',
        'audience' => 'Hvem ser den',
        'button_url' => 'Knaplink',
        'button_url_placeholder' => 'https://… eller /server/abc123',
        'button_url_invalid' => 'Brug et link, der starter med https:// eller med / for en side i dette panel.',
        'button_label' => 'Knaptekst',
        'in_bell' => 'Læg også i alles notifikationer',
        'in_bell_help' => 'Alle, der ser den, finder den også i klokken, fra start til slut.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Advarsel',
        'success' => 'Succes',
    ],
    'audience' => [
        'everyone' => 'Alle',
        'admins' => 'Kun admins',
    ],
    'state' => [
        'live' => 'Aktiv',
        'scheduled' => 'Planlagt',
        'ended' => 'Afsluttet',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Med det samme',
        'until_ended' => 'Indtil afsluttet',
        'end' => 'Afslut nu',
        'end_heading' => 'Afslut denne meddelelse nu?',
        'end_help' => 'Bjælken forsvinder for alle. Du kan vise den igen ved at ændre "Vis indtil".',
        'empty' => 'Ingen meddelelser endnu',
        'empty_help' => 'En meddelelse vises som en bjælke øverst på hver side for de personer, du vælger.',
        'in_bell' => 'Notifikationer',
        'in_bell_sent' => 'Sendt',
        'in_bell_waiting' => 'Venter på start',
    ],
    'bars' => [
        'open' => 'Åbn',
        'until' => 'Indtil',
        'unpin' => 'Frigør',
        'pin_again' => 'Fastgør igen',
    ],
];
