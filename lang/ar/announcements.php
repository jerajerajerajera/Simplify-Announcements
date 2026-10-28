<?php

return [
    'title' => 'الإعلانات',
    'model' => 'إعلان',
    'addon' => [
        'name' => 'الإعلانات',
        'description' => 'رسائل معلومات وتحذير ونجاح أعلى كل صفحة.',
    ],
    'form' => [
        'category' => 'الفئة',
        'title' => 'العنوان',
        'body' => 'الرسالة',
        'starts_at' => 'العرض من',
        'starts_at_help' => 'فارغ: فورًا. الأوقات بتوقيت :zone، المنطقة الزمنية في ملفك الشخصي.',
        'ends_at' => 'العرض حتى',
        'ends_at_help' => 'فارغ: حتى تنهيه.',
        'audience' => 'من يراه',
        'button_url' => 'رابط الزر',
        'button_url_placeholder' => 'https://… أو /server/abc123',
        'button_url_invalid' => 'استخدم رابطًا يبدأ بـ https:// أو بـ / لصفحة في هذه اللوحة.',
        'button_label' => 'نص الزر',
    ],
    'category' => [
        'info' => 'معلومات',
        'warning' => 'تحذير',
        'success' => 'نجاح',
    ],
    'audience' => [
        'everyone' => 'الجميع',
        'admins' => 'المشرفون فقط',
    ],
    'state' => [
        'live' => 'معروض',
        'scheduled' => 'مجدول',
        'ended' => 'انتهى',
    ],
    'table' => [
        'state' => 'الحالة',
        'right_away' => 'فورًا',
        'until_ended' => 'حتى إنهائه',
        'end' => 'إنهاء الآن',
        'end_heading' => 'إنهاء هذا الإعلان الآن؟',
        'end_help' => 'يختفي شريطه لدى الجميع. يمكنك عرضه مرة أخرى بتغيير "العرض حتى".',
        'empty' => 'لا توجد إعلانات بعد',
        'empty_help' => 'يظهر الإعلان كشريط أعلى كل صفحة للأشخاص الذين تختارهم.',
    ],
    'bars' => [
        'open' => 'فتح',
        'until' => 'حتى',
        'unpin' => 'إلغاء التثبيت',
        'pin_again' => 'تثبيت مرة أخرى',
    ],
];
