<?php
session_start();
include '../database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';

// Ambil data produk berdasarkan id
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $ambil = mysqli_query($conn, "SELECT * FROM db_produk WHERE id_produk = '$id'");
    $p = mysqli_fetch_assoc($ambil);
}

// Proses simpan perubahan
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = mysqli_real_escape_string($conn, $_POST['id_produk']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama_produk']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    
    $nama_foto_baru = $_POST['foto_lama']; // pakai foto lama kalau tidak ada yang baru diupload
    
    // Cek apakah ada foto baru yang diupload
    if(!empty($_FILES['foto_baru']['name'])){
        $folder = '../public/images/produk/';
        $nama_foto_baru = time() . '_' . basename($_FILES['foto_baru']['name']);
        $lokasi_file = $_FILES['foto_baru']['tmp_name'];
        $target = $folder . $nama_foto_baru;
        move_uploaded_file($lokasi_file, $target);
    }
    
    // Update ke database
    $query = mysqli_query($conn, "UPDATE db_produk SET 
        nama_produk = '$nama',
        harga = '$harga',
        stok = '$stok',
        kategori = '$kategori',
        deskripsi = '$deskripsi',
        foto = '$nama_foto_baru'
        WHERE id_produk = '$id'");
    
    if($query){
        header("Location: daftar_produk.php?pesan=diubah");
        exit;
    } else {
        $error = "Gagal menyimpan: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Produk — Kios Tendri</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style.css">
    <style>
        .form-container { max-width: 500px; margin: 30px auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .form-container h2 { margin-bottom: 20px; color: #0F5132; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 500; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 15px; }
        .btn-simpan { background: #27ae60; color: white; }
        .btn-kembali { background: #f0f0f0; color: #333; text-decoration: none; display: inline-block; margin-bottom: 15px; }
        .foto-saat-ini { max-width: 100px; margin: 8px 0; border-radius: 4px; }
    </style>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/navbar.php'; ?>

    <div class="form-container">
        <a href="daftar_produk.php" class="btn btn-kembali">← Kembali ke Daftar Produk</a>
        
        <h2>✏️ Ubah Data Produk</h2>
        
        <?php if(isset($error)): ?>
            <p style="color:red; margin-bottom:15px;"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form method="post" action="" enctype="multipart/form-data">
            <input type="hidden" name="id_produk" value="<?php echo $p['id_produk']; ?>">
            <input type="hidden" name="foto_lama" value="<?php echo htmlspecialchars($p['foto']); ?>">
            
            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($p['nama_produk']); ?>" required>
            </div>
            
            <div class="form-group">
                <label>Harga (Rp)</label>
                <input type="number" name="harga" value="<?php echo $p['harga']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" value="<?php echo $p['stok']; ?>" required>
            </div>
            
            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="beras" <?php if($p['kategori']=='beras') echo 'selected'; ?>>🌾 Beras</option>
                    <option value="makanan" <?php if($p['kategori']=='makanan') echo 'selected'; ?>>🍜 Makanan Instan</option>
                    <option value="minuman" <?php if($p['kategori']=='minuman') echo 'selected'; ?>>🥤 Minuman</option>
                    <option value="lainnya" <?php if($p['kategori']=='lainnya') echo 'selected'; ?>>📦 Lainnya</option>
                </select>
            </div>
            
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="3"><?php echo htmlspecialchars($p['deskripsi'] ?? ''); ?></textarea>
            </div>
            
            <div class="form-group">
                <label>Foto Saat Ini</label>
                <?php if(!empty($p['foto']) && file_exists('../public/images/produk/'.$p['foto'])): ?>
                    <img src="<?php echo $base_url; ?>/public/images/produk/<?php echo basename($p['foto']); ?>" class="foto-saat-ini" alt="Foto produk">
                <?php else: ?>
                    <p style="color:#888; font-size:13px;">Belum ada foto</p>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label>Ganti Foto Baru (kosongkan jika tidak diganti)</label>
                <input type="foto" name="foto_baru" accept="images/*">
            </div>
            
            <button type="submit" class="btn btn-simpan">💾 Simpan Perubahan</button>
        </form>
    </div>
	<div class="footer">
    <p>© 2026 Kios Tendri  Alamat: Rampoang | WhatsApp: 082292659304</p>
</div>
</body>
</html>