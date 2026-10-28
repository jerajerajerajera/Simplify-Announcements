<?php

return [
    'title' => 'Közlemények',
    'model' => 'közlemény',
    'addon' => [
        'name' => 'Közlemények',
        'description' => 'Info-, figyelmeztető és siker üzenetek minden oldal tetején.',
    ],
    'form' => [
        'category' => 'Kategória',
        'title' => 'Cím',
        'body' => 'Üzenet',
        'starts_at' => 'Megjelenítés ettől',
        'starts_at_help' => 'Üres: azonnal. Időpontok :zone szerint, a profilod időzónájában.',
        'ends_at' => 'Megjelenítés eddig',
        'ends_at_help' => 'Üres: amíg le nem állítod.',
        'audience' => 'Ki látja',
        'button_url' => 'Gomb linkje',
        'button_url_placeholder' => 'https://… vagy /server/abc123',
        'button_url_invalid' => 'Olyan linket használj, ami https://-sel kezdődik, vagy /-rel a panel egy oldalához.',
        'button_label' => 'Gomb szövege',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Figyelmeztetés',
        'success' => 'Siker',
    ],
    'audience' => [
        'everyone' => 'Mindenki',
        'admins' => 'Csak adminok',
    ],
    'state' => [
        'live' => 'Aktív',
        'scheduled' => 'Ütemezett',
        'ended' => 'Lejárt',
    ],
    'table' => [
        'state' => 'Állapot',
        'right_away' => 'Azonnal',
        'until_ended' => 'Leállításig',
        'end' => 'Leállítás most',
        'end_heading' => 'Leállítod most ezt a közleményt?',
        'end_help' => 'A sávja mindenkinél eltűnik. A "Megjelenítés eddig" módosításával újra megjelenítheted.',
        'empty' => 'Még nincsenek közlemények',
        'empty_help' => 'A közlemény sávként jelenik meg minden oldal tetején a kiválasztott embereknek.',
    ],
    'bars' => [
        'open' => 'Megnyitás',
        'until' => 'Eddig:',
        'unpin' => 'Feloldás',
        'pin_again' => 'Újra kitűzés',
    ],
];
