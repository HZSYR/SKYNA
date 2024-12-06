<?php
require '../../functions.php';

if (isset($_POST['add'])) {
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];
    $promo = $_POST['promo'];
    $targetDirectory = "../uploads/";

    addProduct($nama_produk, $kategori, $promo, $harga, $diskon,  'foto', $targetDirectory);
}

header("Location: index.php");
exit();
