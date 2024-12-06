<?php
include '../../functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Panggil fungsi deleteProduct untuk menghapus data dari database
    deleteCategory($id);
}

// Redirect kembali ke halaman index
header("Location: index.php");
exit();
