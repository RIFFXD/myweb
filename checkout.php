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

if (!isset($_GET['id']) || !isset($products[$_GET['id']])) {
    die("Produk tidak ditemukan");
}

$product = $products[$_GET['id']];
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
} else {
    die("Gagal membuat pembayaran");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Checkout</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{
    background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
}
.card{
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(12px);
    border-radius:20px;
    padding:35px;
    max-width:420px;
    width:90%;
    text-align:center;
    box-shadow:0 15px 40px rgba(0,0,0,0.4);
    animation:fadeIn .7s ease;
}
h1{margin-bottom:10px;}
p{font-size:14px;color:#ddd;margin:8px 0;}
.price{
    font-size:22px;
    color:#00e5ff;
    font-weight:bold;
    margin:15px 0;
}
.btn{
    display:inline-block;
    padding:12px 26px;
    background:linear-gradient(45deg,#00e5ff,#00bcd4);
    color:#000;
    text-decoration:none;
    border-radius:30px;
    font-weight:600;
    transition:.3s;
}
.btn:hover{transform:scale(1.05);}
@keyframes fadeIn{
    from{opacity:0;transform:translateY(15px);}
    to{opacity:1;transform:translateY(0);}
}
</style>
</head>

<body>
<div class="card">
    <h1>Checkout</h1>
    <p>Produk: <b><?= $product['name']; ?></b></p>
    <div class="price">Rp <?= number_format($amount); ?></div>
    <p>Invoice: <?= $reff_id; ?></p>

    <a class="btn" href="<?= $result['data']['qr_url']; ?>" target="_blank">
        Bayar Sekarang (QRIS)
    </a>
</div>
</body>
</html>
