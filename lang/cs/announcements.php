<?php

return [
    'title' => 'Oznámení',
    'model' => 'oznámení',
    'addon' => [
        'name' => 'Oznámení',
        'description' => 'Informační, varovné a úspěšné zprávy nahoře na každé stránce.',
    ],
    'form' => [
        'category' => 'Kategorie',
        'title' => 'Název',
        'body' => 'Zpráva',
        'starts_at' => 'Zobrazit od',
        'starts_at_help' => 'Prázdné: hned. Časy v :zone, časovém pásmu tvého profilu.',
        'ends_at' => 'Zobrazit do',
        'ends_at_help' => 'Prázdné: dokud ho neukončíš.',
        'audience' => 'Kdo to vidí',
        'button_url' => 'Odkaz tlačítka',
        'button_url_placeholder' => 'https://… nebo /server/abc123',
        'button_url_invalid' => 'Použij odkaz, který začíná https:// nebo / pro stránku tohoto panelu.',
        'button_label' => 'Text tlačítka',
        'in_bell' => 'Dát také do oznámení všech',
        'in_bell_help' => 'Každý, kdo ho vidí, ho najde i ve zvonečku, od začátku do konce.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Varování',
        'success' => 'Úspěch',
    ],
    'audience' => [
        'everyone' => 'Všichni',
        'admins' => 'Jen admini',
    ],
    'state' => [
        'live' => 'Aktivní',
        'scheduled' => 'Naplánované',
        'ended' => 'Ukončené',
    ],
    'table' => [
        'state' => 'Stav',
        'right_away' => 'Hned',
        'until_ended' => 'Do ukončení',
        'end' => 'Ukončit teď',
        'end_heading' => 'Ukončit toto oznámení teď?',
        'end_help' => 'Lišta zmizí všem. Můžeš ho znovu zobrazit změnou "Zobrazit do".',
        'empty' => 'Zatím žádná oznámení',
        'empty_help' => 'Oznámení se zobrazí jako lišta nahoře na každé stránce pro lidi, které vybereš.',
        'in_bell' => 'Upozornění',
        'in_bell_sent' => 'Odesláno',
        'in_bell_waiting' => 'Čeká na začátek',
    ],
    'bars' => [
        'open' => 'Otevřít',
        'until' => 'Do',
        'unpin' => 'Odepnout',
        'pin_again' => 'Znovu připnout',
    ],
];
