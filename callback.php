<?php
require 'config.php';
require 'telegram.php';

$input = json_decode(file_get_contents("php://input"), true);

// validasi signature
$signature = hash('sha256', $input['reff_id'] . ATLANTIC_API_KEY);
if (!isset($input['signature']) || $signature !== $input['signature']) {
    http_response_code(403);
    exit("Invalid signature");
}

if ($input['status'] === 'success') {

    sendTelegram(
        "✅ <b>PEMBAYARAN BERHASIL</b>\n".
        "Invoice: {$input['reff_id']}\n".
        "Nominal: Rp".number_format($input['nominal'])
    );

    header("Location: success.php");

    echo "OK";
}
