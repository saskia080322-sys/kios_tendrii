<?php
session_start();
include '../database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';
if (!isset($_SESSION['admin_login'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga = (int)$_POST['harga'];
    $stok = (int)$_POST['stok'];
    $foto = mysqli_real_escape_string($conn, $_POST['foto']);
    
    $query = mysqli_query($conn, "INSERT INTO db_produk (nama_produk, harga, stok, foto) 
        VALUES ('$nama', $harga, $stok, '$foto')");
    
    if ($query) {
        $sukses = "Produk berhasil ditambahkan!";
    } else {
        $error = "Gagal menambahkan produk!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk Baru — Kios Tendri</title>
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
            max-width: 550px;
            margin: 40px auto;
            padding: 0 20px;
            flex: 1;
        }
        
        .btn-kembali {
            background: #666;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 25px;
        }
        
        .btn-kembali:hover { background: #555; }
        
        .form-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
        
        .form-card h2 {
            color: #0F5132;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .sukses {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .error {
            background: #fdecea;
            color: #c0392b;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }
        
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
        }
        
        input:focus {
            outline: none;
            border-color: #27ae60;
        }
        
        .btn-simpan {
            background: #27ae60;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        
        .btn-simpan:hover { background: #0F5132; }
        
        .catatan {
            font-size: 13px;
            color: #888;
            margin-top: -12px;
            margin-bottom: 20px;
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

<div class="admin-header">📦 Tambah Produk Baru — Kios Tendri</div>

<div class="admin-container">
    <a href="daftar_produk.php" class="btn-kembali">← Kembali ke Daftar Produk</a>

    <div class="form-card">
        <h2>Form Tambah Produk</h2>

        <?php if (!empty($sukses)): ?>
            <div class="sukses"><?php echo $sukses; ?></div>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <label>Nama Produk</label>
            <input type="text" name="nama_produk" required>

            <label>Harga (Rp)</label>
            <input type="number" name="harga" required placeholder="Contoh: 25000">

            <label>Stok</label>
            <input type="number" name="stok" required placeholder="Jumlah barang">

            <label>Nama File Foto</label>
            <input type="text" name="foto" placeholder="Contoh: kopi.jpg">
            <p class="catatan">Tulis nama file foto saja, contoh: kopi.jpg</p>

            <button type="submit" class="btn-simpan">💾 Simpan Produk</button>
        </form>
    </div>
</div>

<div class="footer">
    <p>© 2026 Kios Tendri —  Alamat: Rampoang | WhatsApp: 082292659304</p>
</div>

</body>
</html>