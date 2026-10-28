<?php

return [
    'title' => 'Oznámenia',
    'model' => 'oznámenie',
    'addon' => [
        'name' => 'Oznámenia',
        'description' => 'Informačné, varovné a úspešné správy hore na každej stránke.',
    ],
    'form' => [
        'category' => 'Kategória',
        'title' => 'Názov',
        'body' => 'Správa',
        'starts_at' => 'Zobraziť od',
        'starts_at_help' => 'Prázdne: hneď. Časy v :zone, časovom pásme tvojho profilu.',
        'ends_at' => 'Zobraziť do',
        'ends_at_help' => 'Prázdne: kým ho neukončíš.',
        'audience' => 'Kto to vidí',
        'button_url' => 'Odkaz tlačidla',
        'button_url_placeholder' => 'https://… alebo /server/abc123',
        'button_url_invalid' => 'Použi odkaz, ktorý začína https:// alebo / pre stránku tohto panelu.',
        'button_label' => 'Text tlačidla',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Varovanie',
        'success' => 'Úspech',
    ],
    'audience' => [
        'everyone' => 'Všetci',
        'admins' => 'Len admini',
    ],
    'state' => [
        'live' => 'Aktívne',
        'scheduled' => 'Naplánované',
        'ended' => 'Ukončené',
    ],
    'table' => [
        'state' => 'Stav',
        'right_away' => 'Hneď',
        'until_ended' => 'Do ukončenia',
        'end' => 'Ukončiť teraz',
        'end_heading' => 'Ukončiť toto oznámenie teraz?',
        'end_help' => 'Lišta zmizne všetkým. Môžeš ho znova zobraziť zmenou "Zobraziť do".',
        'empty' => 'Zatiaľ žiadne oznámenia',
        'empty_help' => 'Oznámenie sa zobrazí ako lišta hore na každej stránke pre ľudí, ktorých vyberieš.',
    ],
    'bars' => [
        'open' => 'Otvoriť',
        'until' => 'Do',
        'unpin' => 'Odopnúť',
        'pin_again' => 'Znova pripnúť',
    ],
];
