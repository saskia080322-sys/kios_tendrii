<?php
session_start();
include '../database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $wa = mysqli_real_escape_string($conn, $_POST['nomor_whatsapp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    
    // Cek apakah nomor WA sudah ada, kalau belum baru simpan
    $cek = mysqli_query($conn, "SELECT * FROM db_pelanggan WHERE nomor_whatsapp = '$wa'");
    if (mysqli_num_rows($cek) == 0) {
        mysqli_query($conn, "INSERT INTO db_pelanggan (nama_lengkap, nomor_whatsapp, alamat) 
            VALUES ('$nama', '$wa', '$alamat')");
    }
    
    echo json_encode(['status' => 'sukses']);
}