<?php
require 'config.php';
require 'telegram.php';

$products = [
    1 => ['name' => 'Produk A', 'price' => 10000],
    2 => ['name' => 'Produk B', 'price' => 15000],
    3 => ['name' => 'Produk C', 'price' => 20000],
    4 => ['name' => 'Produk D', 'price' => 25000],
    5 => ['name' => 'Produk E', 'price' => 30000],
];

$id = $_GET['id'];
$product = $products[$id];

$reff_id = "INV-" . time();
$amount = $product['price'];

$data = [
    'api_key' => ATLANTIC_API_KEY,
    'reff_id' => $reff_id,
    'nominal' => $amount,
    'metode'  => 'QRIS',
    'type'    => 'deposit'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, ATLANTIC_BASE_URL . '/api/deposit');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if ($result['status'] == true) {

    sendTelegram(
        "🛒 <b>ORDER BARU</b>\n".
        "Produk: {$product['name']}\n".
        "Harga: Rp".number_format($amount)."\n".
        "Invoice: {$reff_id}"
    );

    echo "<h3>Silakan Bayar</h3>";
    echo "<a href='".$result['data']['qr_url']."' target='_blank'>BAYAR QRIS</a>";

} else {
    echo "Gagal membuat pembayaran";
}
