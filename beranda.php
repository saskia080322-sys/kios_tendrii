<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kios Tendri — Beranda</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/navbar.php'; ?>

    <section class="hero">
        <div class="hero-text">
            <h1>Selamat Datang di<br>Kios Tendri</h1>
            <p>Temukan kebutuhan sehari-hari Anda dengan mudah di Kios Tendri. Produk berkualitas, harga terjangkau, dan pelayanan terbaik untuk Anda.</p>
            <a href="<?php echo $base_url; ?>/app/produk.php" class="btn-hijau">Lihat Produk →</a>
        </div>
        <div class="hero-image">
            <div style="font-size: 180px; color: #0F5132;">🏪</div>
        </div>
    </section>

    <section class="section">
        <div class="section-header">
            <h2>Produk Unggulan</h2>
            <a href="<?php echo $base_url; ?>/app/produk.php" class="link-lihat">Lihat Semua →</a>
        </div>
        
        <div class="produk-grid">
            <?php
            $ambil = mysqli_query($koneksi, "SELECT * FROM db_produk LIMIT 8");
            while ($p = mysqli_fetch_assoc($ambil)) {
            ?>
            <div class="produk-card">
                <?php if(!empty($p['foto'])): ?>
                    <img src="<?php echo $base_url; ?>/public/images/produk/<?php echo basename($p['foto']); ?>" alt="<?php echo $p['nama_produk']; ?>">
                <?php else: ?>
                    <div style="font-size: 60px; padding: 30px; background:#f9f9f9; border-radius:6px;">📦</div>
                <?php endif; ?>
                <h3><?php echo $p['nama_produk']; ?></h3>
                <p class="produk-harga">Rp <?php echo number_format($p['harga']); ?></p>
                <button class="btn-tambah" onclick="window.location.href='<?php echo $base_url; ?>/keranjang.php?tambah=<?php echo $p['id_produk']; ?>'">Tambah 🛒</button>
            </div>
            <?php } ?>
        </div>
    </section>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/footer.php'; ?>
</body>
</html>
