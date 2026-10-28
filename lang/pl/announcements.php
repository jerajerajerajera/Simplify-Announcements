<?php

return [
    'title' => 'Ogłoszenia',
    'model' => 'ogłoszenie',
    'addon' => [
        'name' => 'Ogłoszenia',
        'description' => 'Komunikaty informacyjne, ostrzeżenia i sukcesy na górze każdej strony.',
    ],
    'form' => [
        'category' => 'Kategoria',
        'title' => 'Tytuł',
        'body' => 'Wiadomość',
        'starts_at' => 'Pokazuj od',
        'starts_at_help' => 'Puste: od razu. Czas w :zone, strefie czasowej z twojego profilu.',
        'ends_at' => 'Pokazuj do',
        'ends_at_help' => 'Puste: dopóki go nie zakończysz.',
        'audience' => 'Kto widzi',
        'button_url' => 'Link przycisku',
        'button_url_placeholder' => 'https://… lub /server/abc123',
        'button_url_invalid' => 'Użyj linku zaczynającego się od https:// albo od / dla strony tego panelu.',
        'button_label' => 'Tekst przycisku',
        'in_bell' => 'Dodaj też do powiadomień wszystkich',
        'in_bell_help' => 'Każdy, kto je widzi, znajdzie je też pod dzwonkiem, od startu do końca.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Ostrzeżenie',
        'success' => 'Sukces',
    ],
    'audience' => [
        'everyone' => 'Wszyscy',
        'admins' => 'Tylko admini',
    ],
    'state' => [
        'live' => 'Aktywne',
        'scheduled' => 'Zaplanowane',
        'ended' => 'Zakończone',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Od razu',
        'until_ended' => 'Do zakończenia',
        'end' => 'Zakończ teraz',
        'end_heading' => 'Zakończyć to ogłoszenie teraz?',
        'end_help' => 'Pasek zniknie dla wszystkich. Możesz go znowu pokazać, zmieniając "Pokazuj do".',
        'empty' => 'Brak ogłoszeń',
        'empty_help' => 'Ogłoszenie pojawia się jako pasek na górze każdej strony dla wybranych osób.',
        'in_bell' => 'Powiadomienia',
        'in_bell_sent' => 'Wysłane',
        'in_bell_waiting' => 'Czeka na start',
    ],
    'bars' => [
        'open' => 'Otwórz',
        'until' => 'Do',
        'unpin' => 'Odepnij',
        'pin_again' => 'Przypnij ponownie',
    ],
];
