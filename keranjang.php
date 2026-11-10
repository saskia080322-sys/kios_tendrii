<?php
session_start();
include 'database/koneksi.php';
$base_url = 'http://localhost/kios_tendri';

// Buat keranjang kalau belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

// Tambah barang
if (isset($_GET['tambah'])) {
    $id = intval($_GET['tambah']);
    if (isset($_SESSION['keranjang'][$id])) {
        $_SESSION['keranjang'][$id]++;
    } else {
        $_SESSION['keranjang'][$id] = 1;
    }
    header("Location: app/produk.php");
    exit;
}

// Kurangi barang
if (isset($_GET['kurangi'])) {
    $id = intval($_GET['kurangi']);
    if (isset($_SESSION['keranjang'][$id])) {
        if ($_SESSION['keranjang'][$id] > 1) {
            $_SESSION['keranjang'][$id]--;
        } else {
            unset($_SESSION['keranjang'][$id]);
        }
    }
    header("Location: app/pemesanan.php");
    exit;
}

// Hapus barang
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    unset($_SESSION['keranjang'][$id]);
    header("Location: app/pemesanan.php");
    exit;
}
?>