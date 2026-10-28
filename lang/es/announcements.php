<?php

return [
    'title' => 'Anuncios',
    'model' => 'anuncio',
    'addon' => [
        'name' => 'Anuncios',
        'description' => 'Mensajes de información, aviso y éxito en la parte superior de cada página.',
    ],
    'form' => [
        'category' => 'Categoría',
        'title' => 'Título',
        'body' => 'Mensaje',
        'starts_at' => 'Mostrar desde',
        'starts_at_help' => 'Vacío: ahora mismo. Horas en :zone, la zona horaria de tu perfil.',
        'ends_at' => 'Mostrar hasta',
        'ends_at_help' => 'Vacío: hasta que lo termines.',
        'audience' => 'Quién lo ve',
        'button_url' => 'Enlace del botón',
        'button_url_placeholder' => 'https://… o /server/abc123',
        'button_url_invalid' => 'Usa un enlace que empiece por https:// o por / para una página de este panel.',
        'button_label' => 'Texto del botón',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Aviso',
        'success' => 'Éxito',
    ],
    'audience' => [
        'everyone' => 'Todos',
        'admins' => 'Solo admins',
    ],
    'state' => [
        'live' => 'Activo',
        'scheduled' => 'Programado',
        'ended' => 'Terminado',
    ],
    'table' => [
        'state' => 'Estado',
        'right_away' => 'Ahora mismo',
        'until_ended' => 'Hasta que termine',
        'end' => 'Terminar ahora',
        'end_heading' => '¿Terminar este anuncio ahora?',
        'end_help' => 'Su barra desaparece para todos. Puedes volver a mostrarlo cambiando "Mostrar hasta".',
        'empty' => 'Aún no hay anuncios',
        'empty_help' => 'Un anuncio aparece como una barra en la parte superior de cada página para las personas que elijas.',
    ],
    'bars' => [
        'open' => 'Abrir',
        'until' => 'Hasta',
        'unpin' => 'Desfijar',
        'pin_again' => 'Volver a fijar',
    ],
];
