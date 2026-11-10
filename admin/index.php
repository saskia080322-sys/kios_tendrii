<?php
session_start();
include '../database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';
if (!isset($_SESSION['admin_login'])) {
    header("Location: login.php");
    exit;
}

$total_produk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM db_produk"));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dasbor Admin — Kios Tendri</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { 
            background: #FAF7F0; 
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .admin-header {
            background: #0F5132;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        
        .admin-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            flex: 1;
        }
        
        .selamat {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .selamat h2 {
            font-size: 28px;
            color: #0F5132;
            margin-bottom: 10px;
        }
        
        .selamat p {
            color: #666;
            font-size: 16px;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
        }
        
        .menu-card {
            background: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
            text-decoration: none;
            color: #333;
            transition: 0.3s;
        }
        
        .menu-card:hover {
            transform: translateY(-5px);
            background: #27ae60;
            color: white;
        }
        
        .menu-card .angka {
            font-size: 42px;
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 10px;
        }
        
        .menu-card:hover .angka {
            color: white;
        }
        
        .menu-card h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .menu-card p {
            font-size: 14px;
            opacity: 0.8;
        }
        
        .footer {
            background: #0F5132;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: auto;
        }
        
        .footer p {
            margin: 5px 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="admin-header">🏠 Dasbor Admin — Kios Tendri</div>

<div class="admin-container">
    <div class="selamat">
        <h2>Selamat Datang, Admin! 👋</h2>
        <p>Kelola produk dan informasi toko dengan mudah di sini</p>
    </div>

    <div class="menu-grid">
        <a href="daftar_produk.php" class="menu-card">
            <div class="angka"><?php echo $total_produk; ?></div>
            <h3>Produk</h3>
            <p>Kelola daftar barang</p>
        </a>
        <a href="tambah_produk.php" class="menu-card">
            <div class="angka">+</div>
            <h3>Tambah Baru</h3>
            <p>Tambah produk baru</p>
        </a>
        <a href="pelanggan.php" class="menu-card">
            <div class="angka">👥</div>
            <h3>Pelanggan</h3>
            <p>Data pelanggan</p>
        </a>
        <a href="<?php echo $base_url; ?>/app/beranda.php" class="menu-card">
            <div class="angka">🏪</div>
            <h3>Lihat Toko</h3>
            <p>Buka halaman depan</p>
        </a>
    </div>
</div>

<div class="footer">
    <p>© 2026 Kios Tendri —  Alamat: Rampoang | WhatsApp: 082292659304</p>
</div>

</body>