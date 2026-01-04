<?php
require 'config.php';
require 'telegram.php';

$input = json_decode(file_get_contents("php://input"), true);

$signature = hash('sha256', $input['reff_id'] . ATLANTIC_API_KEY);
if ($signature !== $input['signature']) {
    http_response_code(403);
    exit;
}

if ($input['status'] == 'success') {

    sendTelegram(
        "✅ <b>PEMBAYARAN MASUK</b>\n".
        "Invoice: {$input['reff_id']}\n".
        "Nominal: Rp".number_format($input['nominal'])
    );

    echo "OK";
}
