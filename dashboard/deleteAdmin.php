<?php
include '../functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteAdmin($id)) {
        header('Location: index.php'); // Redirect ke halaman daftar admin
        exit;
    } else {
        echo '<div class="alert alert-danger">Gagal menghapus admin!</div>';
    }
}
