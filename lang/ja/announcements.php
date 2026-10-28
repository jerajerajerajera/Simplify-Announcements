<?php

return [
    'title' => 'お知らせ',
    'model' => 'お知らせ',
    'addon' => [
        'name' => 'お知らせ',
        'description' => 'すべてのページ上部に表示する情報・警告・成功メッセージ。',
    ],
    'form' => [
        'category' => 'カテゴリ',
        'title' => 'タイトル',
        'body' => 'メッセージ',
        'starts_at' => '表示開始',
        'starts_at_help' => '空欄: すぐに表示。時刻は :zone(プロフィールのタイムゾーン)です。',
        'ends_at' => '表示終了',
        'ends_at_help' => '空欄: 終了するまで表示。',
        'audience' => '表示対象',
        'button_url' => 'ボタンのリンク',
        'button_url_placeholder' => 'https://… または /server/abc123',
        'button_url_invalid' => 'https:// で始まるリンク、またはこのパネルのページなら / で始まるリンクを使ってください。',
        'button_label' => 'ボタンのテキスト',
        'in_bell' => '全員の通知にも追加',
        'in_bell_help' => '表示対象の人は、開始から終了までベルにも表示されます。',
    ],
    'category' => [
        'info' => '情報',
        'warning' => '警告',
        'success' => '成功',
    ],
    'audience' => [
        'everyone' => '全員',
        'admins' => '管理者のみ',
    ],
    'state' => [
        'live' => '表示中',
        'scheduled' => '予定',
        'ended' => '終了',
    ],
    'table' => [
        'state' => '状態',
        'right_away' => 'すぐに',
        'until_ended' => '終了するまで',
        'end' => '今すぐ終了',
        'end_heading' => 'このお知らせを今すぐ終了しますか?',
        'end_help' => '全員のバーが消えます。「表示終了」を変更すると再び表示できます。',
        'empty' => 'お知らせはまだありません',
        'empty_help' => 'お知らせは、選んだ人のすべてのページ上部にバーとして表示されます。',
        'in_bell' => '通知',
        'in_bell_sent' => '送信済み',
        'in_bell_waiting' => '開始待ち',
    ],
    'bars' => [
        'open' => '開く',
        'until' => '終了:',
        'unpin' => '固定を解除',
        'pin_again' => '再び固定',
    ],
];
