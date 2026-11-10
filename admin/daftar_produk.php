<?php
session_start();
include '../database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';
if (!isset($_SESSION['admin_login'])) {
    header("Location: login.php");
    exit;
}

$produk = mysqli_query($conn, "SELECT * FROM db_produk ORDER BY id_produk DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk — Kios Tendri</title>
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
            max-width: 1200px;
            margin: 30px auto;
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
            margin-bottom: 20px;
        }
        
        .btn-kembali:hover { background: #555; }
        
        .btn-tambah {
            background: #27ae60;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .btn-tambah:hover { background: #0F5132; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }
        
        table th {
            background: #0F5132;
            color: white;
            padding: 14px 15px;
            text-align: left;
            font-weight: 600;
        }
        
        table td {
            padding: 14px 15px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: middle;
        }
        
        table tr:hover { background: #fafaf8; }
        
        .foto-produk {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
            background: #f0f0f0;
        }
        
        .btn-ubah {
            background: #3498db;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
            margin-right: 5px;
        }
        
        .btn-ubah:hover { background: #2980b9; }
        
        .btn-hapus {
            background: #c0392b;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            border: none;
            cursor: pointer;
        }
        
        .btn-hapus:hover { background: #a93226; }
        
        .text-center { text-align: center; }
        
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
        
        @media (max-width: 768px) {
            table { display: block; overflow-x: auto; }
        }
    </style>
</head>
<body>

<div class="admin-header">📦 Daftar Produk — Kios Tendri</div>

<div class="admin-container">
    <a href="index.php" class="btn-kembali">← Kembali ke Dasbor</a>
    <a href="tambah_produk.php" class="btn-tambah">+ Tambah Produk Baru</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($p = mysqli_fetch_assoc($produk)): 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>
                    <?php if (!empty($p['foto'])): ?>
                        <img src="<?php echo $base_url; ?>/public/images/produk/<?php echo $p['foto']; ?>" 
                             alt="<?php echo htmlspecialchars($p['nama_produk']); ?>" class="foto-produk">
                    <?php else: ?>
                        <div class="foto-produk" style="display:flex; align-items:center; justify-content:center; color:#999; font-size:20px;">📷</div>
                    <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($p['nama_produk']); ?></td>
                <td>Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $p['stok']; ?> buah</td>
                <td>
                    <a href="ubah_produk.php?id=<?php echo $p['id_produk']; ?>" class="btn-ubah">Ubah</a>
                    <a href="hapus_produk.php?id=<?php echo $p['id_produk']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
            
            <?php if (mysqli_num_rows($produk) == 0): ?>
            <tr>
                <td colspan="6" class="text-center">Belum ada produk. Silakan tambah produk baru!</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="footer">
    <p>© 2026 Kios Tendri —  Alamat: Rampoang | WhatsApp: 082292659304</p>
    <p>© 2026 Kios Tendri —  Alamat: Rampoang | WhatsApp: 082292659304</p>
</div>

</body>
</html>