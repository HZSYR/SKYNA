<?php
include '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_admin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (addAdmin($email, $password)) {
        header('Location: index.php'); // Redirect ke halaman daftar admin
        exit;
    } else {
        echo '<div class="alert alert-danger">' . $_SESSION['message'] . '</div>';
    }
}
