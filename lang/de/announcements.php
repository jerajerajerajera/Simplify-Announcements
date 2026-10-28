<?php

return [
    'title' => 'Ankündigungen',
    'model' => 'Ankündigung',
    'addon' => [
        'name' => 'Ankündigungen',
        'description' => 'Info-, Warn- und Erfolgsmeldungen oben auf jeder Seite.',
    ],
    'form' => [
        'category' => 'Kategorie',
        'title' => 'Titel',
        'body' => 'Nachricht',
        'starts_at' => 'Anzeigen ab',
        'starts_at_help' => 'Leer: sofort. Zeiten in :zone, der Zeitzone deines Profils.',
        'ends_at' => 'Anzeigen bis',
        'ends_at_help' => 'Leer: bis du sie beendest.',
        'audience' => 'Wer sieht sie',
        'button_url' => 'Button-Link',
        'button_url_placeholder' => 'https://… oder /server/abc123',
        'button_url_invalid' => 'Nutze einen Link, der mit https:// beginnt, oder mit / für eine Seite dieses Panels.',
        'button_label' => 'Button-Text',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Warnung',
        'success' => 'Erfolg',
    ],
    'audience' => [
        'everyone' => 'Alle',
        'admins' => 'Nur Admins',
    ],
    'state' => [
        'live' => 'Live',
        'scheduled' => 'Geplant',
        'ended' => 'Beendet',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Sofort',
        'until_ended' => 'Bis beendet',
        'end' => 'Jetzt beenden',
        'end_heading' => 'Diese Ankündigung jetzt beenden?',
        'end_help' => 'Die Leiste verschwindet für alle. Du kannst sie wieder anzeigen, indem du "Anzeigen bis" änderst.',
        'empty' => 'Noch keine Ankündigungen',
        'empty_help' => 'Eine Ankündigung erscheint als Leiste oben auf jeder Seite für die Personen, die du auswählst.',
    ],
    'bars' => [
        'open' => 'Öffnen',
        'until' => 'Bis',
        'unpin' => 'Lösen',
        'pin_again' => 'Wieder anheften',
    ],
];
