<?php

return [
    'title' => '공지',
    'model' => '공지',
    'addon' => [
        'name' => '공지',
        'description' => '모든 페이지 상단에 표시되는 정보, 경고, 성공 메시지.',
    ],
    'form' => [
        'category' => '분류',
        'title' => '제목',
        'body' => '메시지',
        'starts_at' => '표시 시작',
        'starts_at_help' => '비워 두면 바로 표시. 시간은 프로필의 시간대인 :zone 기준입니다.',
        'ends_at' => '표시 종료',
        'ends_at_help' => '비워 두면 종료할 때까지 표시.',
        'audience' => '보는 사람',
        'button_url' => '버튼 링크',
        'button_url_placeholder' => 'https://… 또는 /server/abc123',
        'button_url_invalid' => 'https://로 시작하는 링크나, 이 패널의 페이지는 /로 시작하는 링크를 사용하세요.',
        'button_label' => '버튼 텍스트',
    ],
    'category' => [
        'info' => '정보',
        'warning' => '경고',
        'success' => '성공',
    ],
    'audience' => [
        'everyone' => '모두',
        'admins' => '관리자만',
    ],
    'state' => [
        'live' => '표시 중',
        'scheduled' => '예약됨',
        'ended' => '종료됨',
    ],
    'table' => [
        'state' => '상태',
        'right_away' => '바로',
        'until_ended' => '종료할 때까지',
        'end' => '지금 종료',
        'end_heading' => '이 공지를 지금 종료할까요?',
        'end_help' => '모든 사람에게서 바가 사라집니다. "표시 종료"를 바꾸면 다시 표시할 수 있습니다.',
        'empty' => '아직 공지가 없습니다',
        'empty_help' => '공지는 선택한 사람들의 모든 페이지 상단에 바로 표시됩니다.',
    ],
    'bars' => [
        'open' => '열기',
        'until' => '종료:',
        'unpin' => '고정 해제',
        'pin_again' => '다시 고정',
    ],
];
