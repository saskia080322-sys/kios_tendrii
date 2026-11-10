<?php 
session_start();
include'../database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';

$where = "1=1";
if(isset($_GET['kategori']) && !empty($_GET['kategori'])){
    $kat = mysqli_real_escape_string($conn, $_GET['kategori']);
    $where = "kategori = '$kat'";
}
if(isset($_GET['cari']) && !empty($_GET['cari'])){
    $cari = mysqli_real_escape_string($conn, $_GET['cari']);
    $where = "(nama_produk LIKE '%$cari%' OR deskripsi LIKE '%$cari%')";
}
$ambil = mysqli_query($conn, "SELECT * FROM db_produk WHERE $where");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk — Kios Tendri</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/navbar.php'; ?>

    <div class="produk-page-container">
        <div class="sidebar">
            <h3>Kategori</h3>
            <div class="kategori-item <?php if(!isset($_GET['kategori'])) echo 'active'; ?>">
                <a href="produk.php" style="color:inherit; text-decoration:none;">✅ Semua Produk</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='beras') echo 'active'; ?>">
                <a href="produk.php?kategori=beras" style="color:inherit; text-decoration:none;">🌾 Beras</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='makanan') echo 'active'; ?>">
                <a href="produk.php?kategori=makanan" style="color:inherit; text-decoration:none;">🍜 Makanan Instan</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='minuman') echo 'active'; ?>">
                <a href="produk.php?kategori=minuman" style="color:inherit; text-decoration:none;">🥤 Minuman</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='lainnya') echo 'active'; ?>">
                <a href="produk.php?kategori=lainnya" style="color:inherit; text-decoration:none;">📦 Lainnya</a>
            </div>
        </div>

        <div class="produk-konten">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                <div>
                    <h1 class="page-title">Daftar Produk Kami</h1>
                    <p class="page-desc">Temukan berbagai produk kebutuhan sehari-hari di Kios Tendri.</p>
                </div>
                <div class="search-produk">
                    <form method="get" action="produk.php">
                        <input type="text" name="cari" placeholder="Cari produk..." value="<?php if(isset($_GET['cari'])) echo htmlspecialchars($_GET['cari']); ?>">
                        <button type="submit">🔍</button>
                    </form>
                </div>
            </div>

            <div class="produk-grid">
                <?php while ($p = mysqli_fetch_assoc($ambil)) { ?>
                <div class="produk-card">
                    <?php if(!empty($p['foto'])): ?>
                        <img src="<?php echo $base_url; ?>/public/images/produk/<?php echo basename($p['foto']); ?>" 
                             alt="<?php echo htmlspecialchars($p['nama_produk']); ?>"
                             style="width:100%; height:120px; object-fit:contain; border-radius:6px; background:#ffffff; padding:5px;">
                    <?php else: ?>
                        <div style="width:100%; height:120px; display:flex; align-items:center; justify-content:center; background:#f9f9f9; border-radius:6px; font-size:40px;">📦</div>
                    <?php endif; ?>
                    
                    <h3 style="margin-top:10px; font-size:16px;"><?php echo htmlspecialchars($p['nama_produk']); ?></h3>
                    <p class="produk-harga">Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></p>
                    <a href="<?php echo $base_url; ?>/keranjang.php?tambah=<?php echo $p['id_produk']; ?>" class="btn-tambah">+ Tambah 🛒</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/footer.php'; ?>
</body>
</html>