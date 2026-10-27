<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';

$where = "1=1";
if(isset($_GET['kategori']) && !empty($_GET['kategori'])){
    $kat = mysqli_real_escape_string($koneksi, $_GET['kategori']);
    $where = "kategori = '$kat'";
}
if(isset($_GET['cari']) && !empty($_GET['cari'])){
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
    $where = "(nama_produk LIKE '%$cari%' OR deskripsi LIKE '%$cari%')";
}
$ambil = mysqli_query($koneksi, "SELECT * FROM db_produk WHERE $where");
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
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='minyak') echo 'active'; ?>">
                <a href="produk.php?kategori=minyak" style="color:inherit; text-decoration:none;">🧈 Minyak & Bumbu</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='makanan') echo 'active'; ?>">
                <a href="produk.php?kategori=makanan" style="color:inherit; text-decoration:none;">🍜 Makanan Instan</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='minuman') echo 'active'; ?>">
                <a href="produk.php?kategori=minuman" style="color:inherit; text-decoration:none;">🥤 Minuman</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='susu') echo 'active'; ?>">
                <a href="produk.php?kategori=susu" style="color:inherit; text-decoration:none;">🥛 Susu & Olahan</a>
            </div>
            <div class="kategori-item <?php if(isset($_GET['kategori']) && $_GET['kategori']=='rumah') echo 'active'; ?>">
                <a href="produk.php?kategori=rumah" style="color:inherit; text-decoration:none;">🧻 Perlengkapan Rumah</a>
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
                    <form method="get" action="index.php">
                        <input type="text" name="cari" placeholder="Cari produk..." value="<?php if(isset($_GET['cari'])) echo $_GET['cari']; ?>">
                        <button type="submit" style="padding:8px 12px; background:#0F5132; color:white; border:none; border-radius:5px; cursor:pointer;">🔍</button>
                    </form>
                </div>
            </div>

            <div class="produk-grid">
                <?php while ($p = mysqli_fetch_assoc($ambil)) { ?>
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
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/footer.php'; ?>
</body>
</html>