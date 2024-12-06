<?php
session_start();
include '../../functions.php';

if (isset($_GET['id']) && isset($_GET['foto'])) {
    $id = $_GET['id'];
    $fotoPath = "../uploads/" . $_GET['foto'];

    // Pastikan file foto ada sebelum mencoba menghapus
    if (file_exists($fotoPath)) {
        unlink($fotoPath);
    }

    // Panggil fungsi deleteProduct untuk menghapus data dari database
    deleteProduct($id, $fotoPath);
}

// Redirect kembali ke halaman index
header("Location: index.php");
exit();
