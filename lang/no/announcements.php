<?php

return [
    'title' => 'Kunngjøringer',
    'model' => 'kunngjøring',
    'addon' => [
        'name' => 'Kunngjøringer',
        'description' => 'Info-, advarsels- og suksessmeldinger øverst på hver side.',
    ],
    'form' => [
        'category' => 'Kategori',
        'title' => 'Tittel',
        'body' => 'Melding',
        'starts_at' => 'Vis fra',
        'starts_at_help' => 'Tomt: med en gang. Tider i :zone, tidssonen i profilen din.',
        'ends_at' => 'Vis til',
        'ends_at_help' => 'Tomt: til du avslutter den.',
        'audience' => 'Hvem ser den',
        'button_url' => 'Knappelenke',
        'button_url_placeholder' => 'https://… eller /server/abc123',
        'button_url_invalid' => 'Bruk en lenke som starter med https:// eller med / for en side i dette panelet.',
        'button_label' => 'Knappetekst',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Advarsel',
        'success' => 'Suksess',
    ],
    'audience' => [
        'everyone' => 'Alle',
        'admins' => 'Bare admins',
    ],
    'state' => [
        'live' => 'Aktiv',
        'scheduled' => 'Planlagt',
        'ended' => 'Avsluttet',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Med en gang',
        'until_ended' => 'Til avsluttet',
        'end' => 'Avslutt nå',
        'end_heading' => 'Avslutte denne kunngjøringen nå?',
        'end_help' => 'Linjen forsvinner for alle. Du kan vise den igjen ved å endre "Vis til".',
        'empty' => 'Ingen kunngjøringer ennå',
        'empty_help' => 'En kunngjøring vises som en linje øverst på hver side for personene du velger.',
    ],
    'bars' => [
        'open' => 'Åpne',
        'until' => 'Til',
        'unpin' => 'Løsne',
        'pin_again' => 'Fest igjen',
    ],
];
