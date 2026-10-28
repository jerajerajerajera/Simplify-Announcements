<?php

return [
    'title' => 'Announcements',
    'model' => 'announcement',
    'addon' => [
        'name' => 'Announcements',
        'description' => 'Info, warning and success messages at the top of every page.',
    ],
    'form' => [
        'category' => 'Category',
        'title' => 'Title',
        'body' => 'Message',
        'starts_at' => 'Show from',
        'starts_at_help' => 'Empty: right away. Times in :zone, the time zone of your profile.',
        'ends_at' => 'Show until',
        'ends_at_help' => 'Empty: until you end it.',
        'audience' => 'Who sees it',
        'button_url' => 'Button link',
        'button_url_placeholder' => 'https://… or /server/abc123',
        'button_url_invalid' => 'Use a link that starts with https:// or with / for a page of this panel.',
        'button_label' => 'Button text',
        'in_bell' => 'Also put in everyone\'s notifications',
        'in_bell_help' => 'Everyone who sees it also finds it in the bell, from when it starts until it ends.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Warning',
        'success' => 'Success',
    ],
    'audience' => [
        'everyone' => 'Everyone',
        'admins' => 'Admins only',
    ],
    'state' => [
        'live' => 'Live',
        'scheduled' => 'Scheduled',
        'ended' => 'Ended',
    ],
    'table' => [
        'state' => 'Status',
        'right_away' => 'Right away',
        'until_ended' => 'Until ended',
        'end' => 'End now',
        'end_heading' => 'End this announcement now?',
        'end_help' => 'Its bar disappears for everyone. You can show it again by changing "Show until".',
        'empty' => 'No announcements yet',
        'empty_help' => 'An announcement shows as a bar at the top of every page for the people you choose.',
        'in_bell' => 'Notifications',
        'in_bell_sent' => 'Sent',
        'in_bell_waiting' => 'Waits for start',
    ],
    'bars' => [
        'open' => 'Open',
        'until' => 'Until',
        'unpin' => 'Unpin',
        'pin_again' => 'Pin again',
    ],
];
