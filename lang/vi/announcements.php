<?php

return [
    'title' => 'Thông báo',
    'model' => 'thông báo',
    'addon' => [
        'name' => 'Thông báo',
        'description' => 'Tin nhắn thông tin, cảnh báo và thành công ở đầu mỗi trang.',
    ],
    'form' => [
        'category' => 'Loại',
        'title' => 'Tiêu đề',
        'body' => 'Nội dung',
        'starts_at' => 'Hiển thị từ',
        'starts_at_help' => 'Để trống: ngay lập tức. Thời gian theo :zone, múi giờ trong hồ sơ của bạn.',
        'ends_at' => 'Hiển thị đến',
        'ends_at_help' => 'Để trống: cho đến khi bạn kết thúc.',
        'audience' => 'Ai thấy',
        'button_url' => 'Liên kết nút',
        'button_url_placeholder' => 'https://… hoặc /server/abc123',
        'button_url_invalid' => 'Dùng liên kết bắt đầu bằng https:// hoặc bằng / cho một trang của panel này.',
        'button_label' => 'Chữ trên nút',
        'in_bell' => 'Đưa cả vào thông báo của mọi người',
        'in_bell_help' => 'Ai thấy nó cũng sẽ thấy trong chuông, từ lúc bắt đầu đến khi kết thúc.',
    ],
    'category' => [
        'info' => 'Info',
        'warning' => 'Cảnh báo',
        'success' => 'Thành công',
    ],
    'audience' => [
        'everyone' => 'Mọi người',
        'admins' => 'Chỉ admin',
    ],
    'state' => [
        'live' => 'Đang hiển thị',
        'scheduled' => 'Đã lên lịch',
        'ended' => 'Đã kết thúc',
    ],
    'table' => [
        'state' => 'Trạng thái',
        'right_away' => 'Ngay lập tức',
        'until_ended' => 'Đến khi kết thúc',
        'end' => 'Kết thúc ngay',
        'end_heading' => 'Kết thúc thông báo này ngay?',
        'end_help' => 'Thanh của nó biến mất với mọi người. Bạn có thể hiện lại bằng cách đổi "Hiển thị đến".',
        'empty' => 'Chưa có thông báo',
        'empty_help' => 'Thông báo hiện thành một thanh ở đầu mỗi trang cho những người bạn chọn.',
        'in_bell' => 'Thông báo',
        'in_bell_sent' => 'Đã gửi',
        'in_bell_waiting' => 'Chờ bắt đầu',
    ],
    'bars' => [
        'open' => 'Mở',
        'until' => 'Đến',
        'unpin' => 'Bỏ ghim',
        'pin_again' => 'Ghim lại',
    ],
];
