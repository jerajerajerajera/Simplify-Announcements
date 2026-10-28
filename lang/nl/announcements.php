<?php

return [
    'title' => 'Aankondigingen',
    'model' => 'aankondiging',
    'addon' => [
        'name' => 'Aankondigingen',
        'description' => 'Info-, waarschuwings- en succesberichten bovenaan elke pagina.',
    ],
    'form' => [
        'category' => 'Categorie',
        'title' => 'Titel',
        'body' => 'Bericht',
        'starts_at' => 'Tonen vanaf',
        'starts_at_help' => 'Leeg: meteen. Tijden in :zone, de tijdzone van je profiel.',
        'ends_at' => 'Tonen tot',
        'ends_at_help' => 'Leeg: tot je hem beëindigt.',
        'audience' => 'Wie ziet het',
        'button_url' => 'Knoplink',
        'button_url_placeholder' => 'https://… of /server/abc123',
        'button_url_invalid' => 'Gebruik een link die begint met https:// of met / voor een pagina van dit paneel.',
        'button_label' => 'Knoptekst',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Waarschuwing',
        'success' => 'Succes',
    ],
    'audience' => [
        'everyone' => 'Iedereen',
        'admins' => 'Alleen admins',
    ],
    'state' => [
        'live' => 'Live',
        'scheduled' => 'Gepland',
        'ended' => 'Afgelopen',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Meteen',
        'until_ended' => 'Tot beëindigd',
        'end' => 'Nu beëindigen',
        'end_heading' => 'Deze aankondiging nu beëindigen?',
        'end_help' => 'De balk verdwijnt voor iedereen. Je kunt hem weer tonen door "Tonen tot" aan te passen.',
        'empty' => 'Nog geen aankondigingen',
        'empty_help' => 'Een aankondiging staat als balk bovenaan elke pagina voor de mensen die je kiest.',
    ],
    'bars' => [
        'open' => 'Openen',
        'until' => 'Tot',
        'unpin' => 'Losmaken',
        'pin_again' => 'Weer vastpinnen',
    ],
];
