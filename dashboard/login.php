<?php
include '../functions.php';
if (isset($_SESSION['admin_id'])) {
  header('Location: index.php');
  exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (loginAdmin($email, $password)) {
    header('Location: index.php'); // Arahkan ke halaman dashboard
    exit;
  } else {
    header('Location: login.php'); // Kembali ke halaman login jika gagal
    exit;
  }
}


$logos = getTableData('logo');

include 'popup.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Edit by Beno Dwianto">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Login Dashboard Skyna Studio</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form method="post">
      <img class="mb-4" src="uploads/<?= $logos[0]['foto'] ?>" alt="" width="150" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <!-- <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <a href ="index.php"><p class="mt-5 mb-3 text-muted">&copy; 2024</p></a>
    </form>
  </main>



</body>

</html>