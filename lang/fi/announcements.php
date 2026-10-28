<?php

return [
    'title' => 'Tiedotteet',
    'model' => 'tiedote',
    'addon' => [
        'name' => 'Tiedotteet',
        'description' => 'Info-, varoitus- ja onnistumisviestit jokaisen sivun yläreunassa.',
    ],
    'form' => [
        'category' => 'Luokka',
        'title' => 'Otsikko',
        'body' => 'Viesti',
        'starts_at' => 'Näytä alkaen',
        'starts_at_help' => 'Tyhjä: heti. Ajat aikavyöhykkeellä :zone, profiilisi aikavyöhyke.',
        'ends_at' => 'Näytä asti',
        'ends_at_help' => 'Tyhjä: kunnes lopetat sen.',
        'audience' => 'Kuka näkee',
        'button_url' => 'Painikkeen linkki',
        'button_url_placeholder' => 'https://… tai /server/abc123',
        'button_url_invalid' => 'Käytä linkkiä, joka alkaa https:// tai / tämän paneelin sivulle.',
        'button_label' => 'Painikkeen teksti',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Varoitus',
        'success' => 'Onnistui',
    ],
    'audience' => [
        'everyone' => 'Kaikki',
        'admins' => 'Vain adminit',
    ],
    'state' => [
        'live' => 'Käynnissä',
        'scheduled' => 'Ajastettu',
        'ended' => 'Päättynyt',
    ],
    'table' => [
        'state' => 'Tila',
        'right_away' => 'Heti',
        'until_ended' => 'Kunnes lopetetaan',
        'end' => 'Lopeta nyt',
        'end_heading' => 'Lopetetaanko tämä tiedote nyt?',
        'end_help' => 'Palkki katoaa kaikilta. Voit näyttää sen uudelleen muuttamalla kohtaa "Näytä asti".',
        'empty' => 'Ei vielä tiedotteita',
        'empty_help' => 'Tiedote näkyy palkkina jokaisen sivun yläreunassa valitsemillesi ihmisille.',
    ],
    'bars' => [
        'open' => 'Avaa',
        'until' => 'Asti',
        'unpin' => 'Irrota',
        'pin_again' => 'Kiinnitä uudelleen',
    ],
];
