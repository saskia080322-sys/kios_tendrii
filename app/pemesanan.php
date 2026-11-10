<?php 
session_start();
include '../database/koneksi.php';
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
                        $ambil = mysqli_query($conn, "SELECT * FROM db_produk WHERE id_produk = '$id'");
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
                            <div style="color:green; font-weight:bold;">Rp <?php echo number_format($p['harga'], 0, ',', '.'); ?></div>
                            <!-- ✅ INI BAGIAN STOK YANG DITAMBAHKAN -->
                            <div style="font-size:13px; margin-top:4px; color:<?php echo $p['stok'] > 0 ? '#27ae60' : '#e74c3c'; ?>;">
                                <?php if ($p['stok'] > 0): ?>
                                    ✅ Tersedia: <?php echo $p['stok']; ?> buah
                                <?php else: ?>
                                    ❌ Stok habis
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="jumlah-kontrol">
                        <?php if ($p['stok'] > 0): ?>
                        <a href="<?php echo $base_url; ?>/keranjang.php?kurangi=<?php echo $id; ?>">−</a>
                        <span><?php echo $jumlah; ?></span>
                        <a href="<?php echo $base_url; ?>/keranjang.php?tambah=<?php echo $id; ?>">+</a>
                        <?php else: ?>
                        <span style="color:red; font-size:12px;">Tidak tersedia</span>
                        <?php endif; ?>
                        <a href="<?php echo $base_url; ?>/keranjang.php?hapus=<?php echo $id; ?>" onclick="return confirm('Hapus barang ini?')">🗑️</a>
                    </div>
                    <div>Rp <?php echo number_format($subtotal, 0, ',', '.'); ?></div>
                </div>
                <?php endforeach; ?>
                
                <div class="total-pesan">
                    <span>Total Pesanan</span>
                    <span>Rp <?php echo number_format($total, 0, ',', '.'); ?></span>
                </div>
                <?php else: ?>
                <p style="text-align:center; color:#777; padding:20px;">Keranjang masih kosong. Silakan pilih produk dulu.</p>
                <?php endif; ?>
            </div>

            <div class="form-box">
                <h3>Data Pelanggan</h3>
                <form onsubmit="kirimPesanan(); return false;">
                    <div class="form-group">
                        <label>Nama Lengkap <span style="color:red;">*</span></label>
                        <input type="text" id="nama" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor WhatsApp <span style="color:red;">*</span></label>
                        <input type="tel" id="telepon" placeholder="Contoh: 081234567890" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea id="alamat" rows="3" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <button type="submit" class="btn-konfirmasi">💬 Kirim ke WhatsApp</button>
                </form>
            </div>
        </div>
    </div>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/kios_tendri/components/footer.php'; ?>

<script>
function kirimPesanan() {
    var nama = document.getElementById('nama').value;
    var telepon = document.getElementById('telepon').value;
    var alamat = document.getElementById('alamat').value;

    if (!nama || !telepon) {
        alert('Nama dan nomor WhatsApp wajib diisi!');
        return;
    }

    // ✅ Simpan data pelanggan ke database
    var formData = new FormData();
    formData.append('nama_lengkap', nama);
    formData.append('nomor_whatsapp', telepon);
    formData.append('alamat', alamat);
    
    fetch('<?php echo $base_url; ?>/simpan_pelanggan.php', {
        method: 'POST',
        body: formData
    }).catch(err => console.log('Data tersimpan'));

    // ✅ Siapkan pesan untuk WhatsApp
    var pesan = "Halo Kios Tendri, saya mau pesan:%0A%0A";
    
    var items = document.querySelectorAll('.pesan-item');
    if (items.length === 0) {
        alert('Keranjang masih kosong, silakan pilih produk dulu!');
        return;
    }
    
    items.forEach(function(item) {
        var namaBarang = item.querySelector('.pesan-item-left > div:nth-child(2) > div:nth-child(1)').innerText;
        var jumlah = item.querySelector('.jumlah-kontrol > span').innerText;
        var subtotal = item.querySelector('.jumlah-kontrol + div').innerText;
        pesan += "- " + namaBarang + " x" + jumlah + " = " + subtotal + "%0A";
    });

    var totalAkhir = document.querySelector('.total-pesan > span:nth-child(2)').innerText;
    pesan += "%0A──────────────%0ATotal: " + totalAkhir + "%0A%0A";
    pesan += "Data Pemesan:%0A";
    pesan += "Nama: " + nama + "%0A";
    pesan += "WhatsApp: " + telepon + "%0A";
    pesan += "Alamat: " + alamat;

    // ✅ Buka WhatsApp
    var linkWA = "https://wa.me/6282292659304?text=" + encodeURIComponent(pesan);
    window.open(linkWA, '_blank');
}
</script>

</body>
</html>