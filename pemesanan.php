<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Anda — Kios Tendri</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/navbar.php'; ?>

    <div class="pesan-container">
        <h1 class="page-title">Pesanan Anda</h1>
        <p class="page-desc">Periksa kembali pesanan Anda dan lengkapi data pelanggan sebelum melakukan pemesanan.</p>

        <div class="pesan-grid">
            <div class="pesan-box">
                <h3>Ringkasan Pesanan</h3>
                
                <?php 
                $total = 0;
                if(!empty($_SESSION['keranjang'])):
                    foreach($_SESSION['keranjang'] as $id => $jumlah):
                        $ambil = mysqli_query($koneksi, "SELECT * FROM db_produk WHERE id_produk = '$id'");
                        $p = mysqli_fetch_assoc($ambil);
                        if(!$p) continue;
                        $subtotal = $p['harga'] * $jumlah;
                        $total += $subtotal;
                ?>
                <div class="pesan-item">
                    <div class="pesan-item-left">
                        <div style="font-size:24px;">📦</div>
                        <div>
                            <div><?php echo $p['nama_produk']; ?></div>
                            <div style="color:green; font-weight:bold;">Rp <?php echo number_format($p['harga']); ?></div>
                        </div>
                    </div>
                    <div class="jumlah-kontrol">
                        <a href="<?php echo $base_url; ?>/keranjang.php?kurangi=<?php echo $id; ?>" style="text-decoration:none; padding:2px 8px; background:#eee; border-radius:4px;">−</a>
                        <span><?php echo $jumlah; ?></span>
                        <a href="<?php echo $base_url; ?>/keranjang.php?tambah=<?php echo $id; ?>" style="text-decoration:none; padding:2px 8px; background:#eee; border-radius:4px;">+</a>
                    </div>
                    <div>Rp <?php echo number_format($subtotal); ?></div>
                </div>
                <?php endforeach; ?>
                
                <div class="total-pesan">
                    <span>Total Pesanan</span>
                    <span>Rp <?php echo number_format($total); ?></span>
                </div>
                <?php else: ?>
                <p style="text-align:center; color:#777; padding:20px;">Keranjang masih kosong</p>
                <?php endif; ?>
            </div>

            <div class="form-box">
                <h3>Data Pelanggan</h3>
                <form action="https://wa.me/082292659302" method="get" target="_blank">
                    <div class="form-group">
                        <label>Nama Lengkap <span style="color:red;">*</span></label>
                        <input type="text" name="text" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon <span style="color:red;">*</span></label>
                        <input type="tel" name="text" placeholder="Masukkan nomor telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="text" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <button type="submit" class="btn-konfirmasi">💬 Kirim ke WhatsApp</button>
                </form>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/footer.php'; ?>
</body>
</html>