<?php

return [
    'title' => 'Pranešimai',
    'model' => 'pranešimas',
    'addon' => [
        'name' => 'Pranešimai',
        'description' => 'Informaciniai, įspėjimo ir sėkmės pranešimai kiekvieno puslapio viršuje.',
    ],
    'form' => [
        'category' => 'Kategorija',
        'title' => 'Pavadinimas',
        'body' => 'Žinutė',
        'starts_at' => 'Rodyti nuo',
        'starts_at_help' => 'Tuščia: iš karto. Laikas pagal :zone, tavo profilio laiko juostą.',
        'ends_at' => 'Rodyti iki',
        'ends_at_help' => 'Tuščia: kol jo nepabaigsi.',
        'audience' => 'Kas mato',
        'button_url' => 'Mygtuko nuoroda',
        'button_url_placeholder' => 'https://… arba /server/abc123',
        'button_url_invalid' => 'Naudok nuorodą, kuri prasideda https:// arba / šio skydelio puslapiui.',
        'button_label' => 'Mygtuko tekstas',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Įspėjimas',
        'success' => 'Sėkmė',
    ],
    'audience' => [
        'everyone' => 'Visi',
        'admins' => 'Tik adminai',
    ],
    'state' => [
        'live' => 'Rodomas',
        'scheduled' => 'Suplanuotas',
        'ended' => 'Baigtas',
    ],
    'table' => [
        'state' => 'Būsena',
        'right_away' => 'Iš karto',
        'until_ended' => 'Kol baigsis',
        'end' => 'Baigti dabar',
        'end_heading' => 'Baigti šį pranešimą dabar?',
        'end_help' => 'Juosta dings visiems. Gali jį vėl parodyti pakeitęs "Rodyti iki".',
        'empty' => 'Pranešimų dar nėra',
        'empty_help' => 'Pranešimas rodomas kaip juosta kiekvieno puslapio viršuje tavo pasirinktiems žmonėms.',
    ],
    'bars' => [
        'open' => 'Atidaryti',
        'until' => 'Iki',
        'unpin' => 'Atsegti',
        'pin_again' => 'Vėl prisegti',
    ],
];
