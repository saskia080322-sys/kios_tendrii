<?php
session_start();
include '../database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';
if (!isset($_SESSION['admin_login'])) {
    header("Location: login.php");
    exit;
}

$pelanggan = mysqli_query($conn, "SELECT * FROM db_pelanggan ORDER BY id_pelanggan DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan — Kios Tendri</title>
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
            margin-bottom: 25px;
        }
        
        .btn-kembali:hover { background: #555; }
        
        h3 {
            color: #0F5132;
            margin-bottom: 20px;
        }
        
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
        }
        
        table tr:hover { background: #fafaf8; }
        
        .text-center { text-align: center; color: #666; padding: 20px !important; }
        
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

<div class="admin-header">👥 Data Pelanggan — Kios Tendri</div>

<div class="admin-container">
    <a href="index.php" class="btn-kembali">← Kembali ke Dasbor</a>

    <h3>Total Pelanggan: <?php echo mysqli_num_rows($pelanggan); ?> orang</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Nomor WhatsApp</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while ($p = mysqli_fetch_assoc($pelanggan)): 
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($p['nama_lengkap']); ?></td>
                <td><?php echo htmlspecialchars($p['nomor_whatsapp']); ?></td>
                <td><?php echo htmlspecialchars(substr($p['alamat'], 0, 35)); ?>...</td>
                <td><?php echo date('d/m/Y', strtotime($p['tanggal_daftar'])); ?></td>
            </tr>
            <?php endwhile; ?>
            
            <?php if (mysqli_num_rows($pelanggan) == 0): ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada data pelanggan</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="footer">
    <p>© 2026 Kios Tendri - Alamat: Rampoang | WhatsApp: 082292659304</p>
</div>

</body>
</html>