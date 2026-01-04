<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pembayaran Berhasil</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Segoe UI', sans-serif;
}
body{
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
}
.card{
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border-radius:20px;
    padding:40px 35px;
    max-width:420px;
    width:90%;
    text-align:center;
    box-shadow:0 15px 40px rgba(0,0,0,0.4);
    animation: fadeIn 0.8s ease;
}
.icon{
    font-size:64px;
    margin-bottom:20px;
    color:#00e5ff;
}
h1{
    font-size:26px;
    margin-bottom:10px;
}
p{
    font-size:14px;
    color:#ddd;
    line-height:1.7;
}
.btn{
    margin-top:25px;
    display:inline-block;
    padding:12px 28px;
    background: linear-gradient(45deg,#00e5ff,#00bcd4);
    color:#000;
    text-decoration:none;
    border-radius:30px;
    font-weight:600;
    transition:0.3s;
}
.btn:hover{
    transform: scale(1.05);
}
@keyframes fadeIn{
    from{opacity:0; transform:translateY(15px);}
    to{opacity:1; transform:translateY(0);}
}
</style>
</head>

<body>

<div class="card">
    <div class="icon">✅</div>
    <h1>Pembayaran Berhasil</h1>
    <p>
        Terima kasih 🙏<br>
        Pembayaran kamu sudah kami terima dan sedang diproses.
    </p>

    <a class="btn" href="index.php">Kembali ke Toko</a>
</div>

</body>
</html>
