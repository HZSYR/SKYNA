<?php
include '../functions.php';
isLoggedIn();

session_start();
session_destroy();
header('Location: login.php');
exit;
