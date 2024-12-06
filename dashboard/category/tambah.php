<?php
require '../../functions.php';

if (isset($_POST['add'])) {
    $nama_kategori = $_POST['category'];

    addCategory($nama_kategori);
}

header("Location: index.php");
exit();
