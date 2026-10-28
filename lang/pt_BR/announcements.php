<?php

return [
    'title' => 'Anúncios',
    'model' => 'anúncio',
    'addon' => [
        'name' => 'Anúncios',
        'description' => 'Mensagens de informação, aviso e sucesso no topo de cada página.',
    ],
    'form' => [
        'category' => 'Categoria',
        'title' => 'Título',
        'body' => 'Mensagem',
        'starts_at' => 'Mostrar a partir de',
        'starts_at_help' => 'Vazio: agora. Horários em :zone, o fuso horário do seu perfil.',
        'ends_at' => 'Mostrar até',
        'ends_at_help' => 'Vazio: até você encerrar.',
        'audience' => 'Quem vê',
        'button_url' => 'Link do botão',
        'button_url_placeholder' => 'https://… ou /server/abc123',
        'button_url_invalid' => 'Use um link que comece com https:// ou com / para uma página deste painel.',
        'button_label' => 'Texto do botão',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Aviso',
        'success' => 'Sucesso',
    ],
    'audience' => [
        'everyone' => 'Todos',
        'admins' => 'Só admins',
    ],
    'state' => [
        'live' => 'Ativo',
        'scheduled' => 'Agendado',
        'ended' => 'Encerrado',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Agora',
        'until_ended' => 'Até encerrar',
        'end' => 'Encerrar agora',
        'end_heading' => 'Encerrar este anúncio agora?',
        'end_help' => 'A barra some para todos. Você pode mostrá-lo de novo alterando "Mostrar até".',
        'empty' => 'Ainda não há anúncios',
        'empty_help' => 'Um anúncio aparece como uma barra no topo de cada página para as pessoas que você escolher.',
    ],
    'bars' => [
        'open' => 'Abrir',
        'until' => 'Até',
        'unpin' => 'Desafixar',
        'pin_again' => 'Fixar de novo',
    ],
];
