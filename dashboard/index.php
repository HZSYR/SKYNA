<?php
include '../functions.php';
$admins = getTableData('admin');
$category = getTableData('kategori');
$promo = getTableData('produk', 'promo = "iya"');
$totalPromo = count($promo);

include 'popup.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Dashboard Skyna Studio</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



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

    .product-table th {
      background-color: #0d6efd;
      color: white;
      text-align: center;
    }

    .product-table td {
      vertical-align: middle;
      text-align: center;
    }

    .product-image {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 5px;
    }

    .discount-badge {
      background-color: #ffc107;
      color: black;
      padding: 0.25em 0.5em;
      border-radius: 5px;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="dashboard.css" rel="stylesheet">
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Dashboard</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="SKYNA STUDIO" aria-label="Search">
    <?php isLoggedIn(); ?>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="logout.php"><span data-feather="arrow-left"></span>Log out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">

      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <h5>
                <a class="nav-link active" aria-current="page" href="#">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </h5>
            </li>
            <li class="nav-item">
              <h5>
                <a class="nav-link" href="category">
                  <span data-feather="grid"></span>
                  Category
                </a>
              </h5>
            </li>
            <li class="nav-item">
              <h5>
                <a class="nav-link" href="products">
                  <span data-feather="package"></span>
                  Products
                </a>
              </h5>
            </li>
            <li class="nav-item">
              <h5>
                <a class="nav-link" href="logo/header.php">
                  <span data-feather="image"></span>
                  Logo
                </a>
              </h5>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>

        <div class="container d-flex justify-content-between flex-wrap mt-5">
          <div class="card shadow-lg" style="width: 18rem; height: 12rem;">
            <div class="card-body d-flex flex-column justify-content-between">
              <h1 class="card-title d-flex justify-content-center display-1"><?php echo count($admins); ?></h1>

              <h6 class="card-subtitle mb-2 text-muted d-flex justify-content-center mb-0">Total User</h6>
            </div>
          </div>

          <div class="card shadow-lg" style="width: 18rem; height: 12rem;">
            <div class="card-body d-flex flex-column justify-content-between">
              <h1 class="card-title d-flex justify-content-center display-1"><?php echo count($category); ?></h1>

              <h6 class="card-subtitle mb-2 text-muted d-flex justify-content-center mb-0">Total Category</h6>
            </div>
          </div>

          <div class="card shadow-lg" style="width: 18rem; height: 12rem;">
            <div class="card-body d-flex flex-column justify-content-between">
              <h1 class="card-title d-flex justify-content-center display-1"><?php echo count($promo); ?></h1>

              <h6 class="card-subtitle mb-2 text-muted d-flex justify-content-center mb-0">Total Promo</h6>
            </div>
          </div>
        </div>

    </div>
    </main>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product List</h1>
      </div>

      <table class="table table-bordered product-table shadow">
        <thead>
          <tr>
            <th>No</th>
            <th>Email</th>
            <th>aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          if (count($admins) == 0) {
            echo "<tr><td colspan='7' class='text-center'>Data Admin Kosong</td></tr>";
          } else {
            foreach ($admins as $admin) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($admin['email']); ?></td>
                <td class="action-buttons">
                  <a href="deleteAdmin.php?id=<?= $admin['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    <i data-feather="trash-2" style="width: 16px; height: 16px"></i>
                  </a>
                </td>
              </tr>
          <?php endforeach;
          } ?>
        </tbody>
      </table>

      <!-- Button to trigger modal -->
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAdminModal">
        Tambah Admin
      </button>

      <!-- Modal for adding data -->
      <div class="modal fade" id="addAdminModal" tabindex="-1" aria-labelledby="addAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addAdminModalLabel">Tambah Data Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="addAdmin.php" method="POST"">
              <div class=" modal-body">
              <!-- Nama Produk -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <!-- password -->
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" name="add_admin">Simpan</button>
          </div>
          </form>
        </div>
      </div>
  </div>
  </div>
  </div>

  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
  <script src="dashboard.js"></script>
</body>

</html>