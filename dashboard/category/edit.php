<?php
include '../../functions.php';
$products = getTableData('produk');
$admin = getTableData('admin');

include '../popup.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = $conn->query("SELECT * FROM kategori WHERE id = $id")->fetch_assoc(); // Fungsi untuk mengambil data produk berdasarkan ID

    if (!$category) {
        echo '<div class="alert alert-danger">Category tidak ditemukan!</div>';
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];

    if (updateCategory($id, $category)) {
        header('Location: index.php');
        exit;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Edit Produk</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="../dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Dashboard</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="SKYNA STUDIO" aria-label="Search">
        <?php include '../head.php'; ?>
    </header>

    <div class="container-fluid">
        <div class="row">

            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5>
                                <a class="nav-link" aria-current="page" href="../">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </a>
                            </h5>
                        </li>
                        <li class="nav-item">
                            <h5>
                                <a class="nav-link active" href="index.php">
                                    <span data-feather="grid"></span>
                                    Category
                                </a>
                            </h5>
                        </li>
                        <li class="nav-item">
                            <h5>
                                <a class="nav-link" href="../products/">
                                    <span data-feather="package"></span>
                                    Products
                                </a>
                            </h5>
                        </li>
                        <li class="nav-item">
                            <h5>
                                <a class="nav-link" href="../logo/header.php">
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
                    <h1 class="h2">Edit Kategori</h1>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Edit Kategori</div>
                        <div class="card-body shadow-sm">

                            <form action="" method="POST">

                                <div class="mb-3">
                                    <label for="category" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="category" name="category" value="<?= $category['kategori']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="index.php" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="../dashboard.js"></script>
</body>

</html>