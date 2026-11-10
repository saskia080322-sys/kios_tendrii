<?php
session_start();
include '../database/koneksi.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Hapus data produk
    $query = mysqli_query($conn, "DELETE FROM db_produk WHERE id_produk = '$id'");
    
    if($query){
        header("Location: daftar_produk.php?pesan=berhasil");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    header("Location: daftar_produk.php");
    exit;
}
?>