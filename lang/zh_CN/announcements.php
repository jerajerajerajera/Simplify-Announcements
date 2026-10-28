<?php

return [
    'title' => '公告',
    'model' => '公告',
    'addon' => [
        'name' => '公告',
        'description' => '在每个页面顶部显示的信息、警告和成功消息。',
    ],
    'form' => [
        'category' => '类别',
        'title' => '标题',
        'body' => '内容',
        'starts_at' => '显示开始',
        'starts_at_help' => '留空:立即显示。时间为 :zone,即你个人资料中的时区。',
        'ends_at' => '显示结束',
        'ends_at_help' => '留空:直到你结束它。',
        'audience' => '谁能看到',
        'button_url' => '按钮链接',
        'button_url_placeholder' => 'https://… 或 /server/abc123',
        'button_url_invalid' => '请使用以 https:// 开头的链接,或以 / 开头的本面板页面。',
        'button_label' => '按钮文字',
        'in_bell' => '同时放入所有人的通知',
        'in_bell_help' => '能看到它的人从开始到结束都能在铃铛里找到它。',
    ],
    'category' => [
        'info' => '信息',
        'warning' => '警告',
        'success' => '成功',
    ],
    'audience' => [
        'everyone' => '所有人',
        'admins' => '仅管理员',
    ],
    'state' => [
        'live' => '显示中',
        'scheduled' => '已计划',
        'ended' => '已结束',
    ],
    'table' => [
        'state' => '状态',
        'right_away' => '立即',
        'until_ended' => '直到结束',
        'end' => '立即结束',
        'end_heading' => '现在结束这条公告?',
        'end_help' => '所有人的横幅都会消失。修改“显示结束”即可再次显示。',
        'empty' => '还没有公告',
        'empty_help' => '公告会以横幅形式显示在你所选的人每个页面的顶部。',
        'in_bell' => '通知',
        'in_bell_sent' => '已发送',
        'in_bell_waiting' => '等待开始',
    ],
    'bars' => [
        'open' => '打开',
        'until' => '截止',
        'unpin' => '取消固定',
        'pin_again' => '重新固定',
    ],
];
