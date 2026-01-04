<?php
$products = [
    1 => ['name' => 'Produk A', 'price' => 10000, 'desc' => 'Deskripsi produk A'],
    2 => ['name' => 'Produk B', 'price' => 15000, 'desc' => 'Deskripsi  produk B'],
    3 => ['name' => 'Produk C', 'price' => 20000, 'desc' => 'Deskripsi  produk C'],
    4 => ['name' => 'Produk D', 'price' => 25000, 'desc' => 'Deskripsi  produk D'],
    5 => ['name' => 'Produk E', 'price' => 30000, 'desc' => 'Deskripsi  produk E'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Simple Store</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}
body{
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    color:#fff;
    min-height:100vh;
}
header{
    padding:40px 20px;
    text-align:center;
}
header h1{
    font-size:36px;
    font-weight:700;
}
header p{
    margin-top:10px;
    color:#cfd8dc;
}
.container{
    max-width:1100px;
    margin:auto;
    padding:20px;
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(250px,1fr));
    gap:25px;
}
.card{
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(10px);
    border-radius:16px;
    padding:25px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    transition:0.3s;
}
.card:hover{
    transform:translateY(-8px);
}
.card h3{
    font-size:22px;
    margin-bottom:10px;
}
.card p{
    font-size:14px;
    color:#ddd;
    line-height:1.6;
}
.price{
    font-size:20px;
    font-weight:bold;
    margin:15px 0;
    color:#00e5ff;
}
.btn{
    display:inline-block;
    padding:12px 20px;
    background: linear-gradient(45deg,#00e5ff,#00bcd4);
    color:#000;
    text-decoration:none;
    border-radius:30px;
    font-weight:600;
    transition:0.3s;
}
.btn:hover{
    background: linear-gradient(45deg,#00bcd4,#00e5ff);
}
footer{
    text-align:center;
    padding:30px;
    color:#bbb;
    font-size:13px;
}
</style>
</head>

<body>

<header>
    <h1>🔥 SIMPLE STORE 🔥</h1>
    <p>Produk digital cepat • Pembayaran QRIS otomatis</p>
</header>

<section class="container">
<?php foreach($products as $id => $p): ?>
    <div class="card">
        <h3><?= $p['name']; ?></h3>
        <p><?= $p['desc']; ?></p>
        <div class="price">Rp <?= number_format($p['price']); ?></div>
        <a class="btn" href="checkout.php?id=<?= $id; ?>">Beli Sekarang</a>
    </div>
<?php endforeach; ?>
</section>

<footer>
    © <?= date('Y'); ?> Simple Store • Powered by Atlantic Payment
</footer>

</body>
</html>
