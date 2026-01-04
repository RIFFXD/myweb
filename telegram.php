<?php
function sendTelegram($message) {
    $url = "https://api.telegram.org/bot".BOT_TOKEN."/sendMessage";
    $data = [
        'chat_id' => CHAT_ID,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];

    file_get_contents($url . "?" . http_build_query($data));
}
