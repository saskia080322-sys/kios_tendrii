<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak — Kios Tendri</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>/public/css/style.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/navbar.php'; ?>

    <div class="kontak-container">
        <h1 class="page-title">Hubungi Kami</h1>
        <p class="page-desc">Hubungi kami untuk informasi produk, harga, dan ketersediaan barang.</p>

        <div class="kontak-grid">
            <div class="map-box">
                <div class="map-placeholder">
                    📍 Peta Lokasi Kios Tendri<br>Jl.Poros palopo-Masamba,Rampoang,Sulawesi Selatan,(Pas Depan Lapangan Rampoang
                </div>
            </div>

            <div class="kontak-info-box">
                <div class="info-card">
                    <h4>📍 Alamat</h4>
                    <p>Jl. Jl. Poros palopo-Masamba,Rampoang,,(Pas Depan Lapangan Rampoang), Sulawesi Selatan</p>
                    <a href="#" style="color:#27ae60; font-size:14px;">Lihat di Google Maps →</a>
                </div>
                <div class="info-card">
                    <h4>📞 Nomor WhatsApp</h4>
                    <p>082292659304</p>
                </div>
                <div class="info-card">
                    <h4>🕐 Jam Operasional</h4>
                    <p>Buka Setiap Hari: 06.00 — 21.00 WITA</p>
                    <p>Minggu: 08.00 — 17.00 WITA</p>
                </div>
                <a href="https://wa.me/082292659304" target="_blank" style="text-decoration:none;">
                    <button class="btn-hubungi">💬 Hubungi Kami</button>
                </a>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/footer.php'; ?>
</body>
</html>