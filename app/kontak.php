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
                <h4>📍 Peta Lokasi</h4>
                <div style="width:100%; height:280px; background:#e9f5e9; border-radius:6px; display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:20px; box-sizing:border-box;">
                    <div style="font-size:60px;">📍</div>
                    <h4 style="margin:10px 0;">Kios Tendri</h4>
                    <p style="margin:5px 0;">Jl. Poros Palopo-Masamba, Rampoang</p>
                    <p style="margin:5px 0;">Depan Lapangan Rampoang, Palopo</p>
                    <a href="https://www.google.com/maps/search/?api=1&query=Rampoang,Palopo,Sulawesi+Selatan" 
                       target="_blank" 
                       style="display:inline-block; margin-top:15px; padding:8px 20px; background:#27ae60; color:white; border-radius:5px; text-decoration:none; font-weight:bold;">
                        📍 Buka di Google Maps
                    </a>
                </div>
            </div>

            <div class="kontak-info-box">
                <div class="info-card">
                    <h4>📍 Alamat Lengkap</h4>
                    <p>Jl. Poros Palopo — Masamba, Rampoang,<br>Kota Palopo, Sulawesi Selatan<br><small>(Tepat di depan Lapangan Rampoang)</small></p>
                </div>
                <div class="info-card">
                    <h4>💬 WhatsApp</h4>
                    <p><a href="https://wa.me/6282292659304" target="_blank" style="color:#27ae60; text-decoration:none;">0822-9265-9304</a></p>
                </div>
                <div class="info-card">
                    <h4>🕐 Jam Buka</h4>
                    <p>Senin — Sabtu: 06.00 — 21.00 WITA</p>
                    <p>Minggu: 08.00 — 17.00 WITA</p>
                </div>
                <a href="https://wa.me/6282292659304?text=Halo%20Kios%20Tendri%2C%20saya%20mau%20tanya%20produk" target="_blank" style="text-decoration:none; display:inline-block; margin-top:10px;">
                    <button class="btn-hubungi">💬 Kirim Pesan WhatsApp</button>
                </a>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/footer.php'; ?>
</body>
</html>