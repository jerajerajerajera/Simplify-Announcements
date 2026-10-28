<?php

return [
    'title' => 'Annunci',
    'model' => 'annuncio',
    'addon' => [
        'name' => 'Annunci',
        'description' => 'Messaggi di info, avviso e successo in cima a ogni pagina.',
    ],
    'form' => [
        'category' => 'Categoria',
        'title' => 'Titolo',
        'body' => 'Messaggio',
        'starts_at' => 'Mostra da',
        'starts_at_help' => 'Vuoto: subito. Orari in :zone, il fuso orario del tuo profilo.',
        'ends_at' => 'Mostra fino a',
        'ends_at_help' => 'Vuoto: finché non lo termini.',
        'audience' => 'Chi lo vede',
        'button_url' => 'Link del pulsante',
        'button_url_placeholder' => 'https://… o /server/abc123',
        'button_url_invalid' => 'Usa un link che inizia con https:// o con / per una pagina di questo pannello.',
        'button_label' => 'Testo del pulsante',
        'in_bell' => 'Metti anche nelle notifiche di tutti',
        'in_bell_help' => 'Chi lo vede lo trova anche nella campanella, dall\'inizio alla fine.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Avviso',
        'success' => 'Successo',
    ],
    'audience' => [
        'everyone' => 'Tutti',
        'admins' => 'Solo admin',
    ],
    'state' => [
        'live' => 'Attivo',
        'scheduled' => 'Programmato',
        'ended' => 'Terminato',
    ],
    'table' => [
        'state' => 'Stato',
        'right_away' => 'Subito',
        'until_ended' => 'Fino al termine',
        'end' => 'Termina ora',
        'end_heading' => 'Terminare questo annuncio ora?',
        'end_help' => 'La sua barra scompare per tutti. Puoi mostrarlo di nuovo modificando "Mostra fino a".',
        'empty' => 'Ancora nessun annuncio',
        'empty_help' => 'Un annuncio appare come una barra in cima a ogni pagina per le persone che scegli.',
        'in_bell' => 'Notifiche',
        'in_bell_sent' => 'Inviato',
        'in_bell_waiting' => 'Attende l\'inizio',
    ],
    'bars' => [
        'open' => 'Apri',
        'until' => 'Fino a',
        'unpin' => 'Sblocca',
        'pin_again' => 'Fissa di nuovo',
    ],
];
