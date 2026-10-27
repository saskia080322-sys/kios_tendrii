<?php $base_url = 'http://localhost/kios_tendri'; ?>
<div class="navbar">
    <div class="navbar-logo">
        <span>🏠</span> KIOS TENDRI
    </div>
    <div class="navbar-menu">
        <a href="<?php echo $base_url; ?>/app/beranda.php">Beranda</a>
        <a href="<?php echo $base_url; ?>/app/produk.php">Produk</a>
        <a href="<?php echo $base_url; ?>/app/pemesanan.php">Pesanan Anda</a>
        <a href="<?php echo $base_url; ?>/app/kontak.php">Kontak</a>
    </div>
    <div class="navbar-actions">
        <input type="text" class="search-box" placeholder="Cari produk...">
        <span>🛒</span>
    </div>
</div>