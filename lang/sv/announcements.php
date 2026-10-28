<?php

return [
    'title' => 'Meddelanden',
    'model' => 'meddelande',
    'addon' => [
        'name' => 'Meddelanden',
        'description' => 'Info-, varnings- och klartmeddelanden högst upp på varje sida.',
    ],
    'form' => [
        'category' => 'Kategori',
        'title' => 'Rubrik',
        'body' => 'Meddelande',
        'starts_at' => 'Visa från',
        'starts_at_help' => 'Tomt: direkt. Tider i :zone, tidszonen i din profil.',
        'ends_at' => 'Visa till',
        'ends_at_help' => 'Tomt: tills du avslutar det.',
        'audience' => 'Vem ser det',
        'button_url' => 'Knapplänk',
        'button_url_placeholder' => 'https://… eller /server/abc123',
        'button_url_invalid' => 'Använd en länk som börjar med https:// eller med / för en sida i den här panelen.',
        'button_label' => 'Knapptext',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Varning',
        'success' => 'Klart',
    ],
    'audience' => [
        'everyone' => 'Alla',
        'admins' => 'Bara admins',
    ],
    'state' => [
        'live' => 'Aktivt',
        'scheduled' => 'Schemalagt',
        'ended' => 'Avslutat',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Direkt',
        'until_ended' => 'Tills det avslutas',
        'end' => 'Avsluta nu',
        'end_heading' => 'Avsluta det här meddelandet nu?',
        'end_help' => 'Fältet försvinner för alla. Du kan visa det igen genom att ändra "Visa till".',
        'empty' => 'Inga meddelanden än',
        'empty_help' => 'Ett meddelande visas som ett fält högst upp på varje sida för de personer du väljer.',
    ],
    'bars' => [
        'open' => 'Öppna',
        'until' => 'Till',
        'unpin' => 'Lossa',
        'pin_again' => 'Fäst igen',
    ],
];
