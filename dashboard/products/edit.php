<?php
include '../../functions.php';
$products = getTableData('produk');
$admin = getTableData('admin');

include '../popup.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $conn->query("SELECT * FROM produk WHERE id = $id")->fetch_assoc();

    if (!$product) {
        echo '<div class="alert alert-danger">Produk tidak ditemukan!</div>';
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $diskon = $_POST['diskon'];
    $promo = $_POST['promo'];
    $foto_lama = $_POST['foto_lama'];
    $fileInputName = 'foto'; // Nama input file
    $targetDirectory = '../uploads/'; // Direktori penyimpanan foto

    // Gunakan fungsi updateProduct()
    $isUpdated = updateProduct($id, $nama_produk, $kategori, $promo, $harga, $diskon, $fileInputName, $targetDirectory, $foto_lama);

    if ($isUpdated) {
        header('Location: index.php');
        exit;
    } else {
        echo '<div class="alert alert-danger">Gagal memperbarui produk!</div>';
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
                                <a class="nav-link" href="../category">
                                    <span data-feather="grid"></span>
                                    Category
                                </a>
                            </h5>
                        </li>
                        <li class="nav-item">
                            <h5>
                                <a class="nav-link active" href="index.php">
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
                    <h1 class="h2">Edit Data Produk</h1>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Edit Produk</div>
                        <div class="card-body shadow-sm">

                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="foto_lama" value="<?= $product['foto']; ?>">

                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $product['nama_produk']; ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" id="kategori" name="kategori" required>
                                        <option value="" disabled>Pilih Kategori</option>
                                        <?php
                                        $categories = getTableData('kategori'); // Fungsi untuk mengambil data kategori
                                        foreach ($categories as $category) : ?>
                                            <option value="<?= $category['kategori']; ?>" <?= $product['kategori'] == $category['kategori'] ? 'selected' : ''; ?>><?= $category['kategori']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="promo" class="form-label">Promo</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="promo" id="flexRadioDefault1" value="iya" <?php echo ($product['promo'] == 'iya') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Jadikan Promo
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="promo" id="flexRadioDefault2" value="tidak" <?php echo ($product['promo'] == 'tidak') ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Bukan Promo
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="harga" class="form-label">Harga</label>
                                            <input type="number" class="form-control" id="harga" name="harga" value="<?= $product['harga']; ?>" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="diskon" class="form-label">Diskon (%)</label>
                                            <input type="number" class="form-control" id="diskon" name="diskon" value="<?= $product['diskon']; ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Produk</label>
                                    <div class="mb-2">
                                        <img src="../uploads/<?= $product['foto']; ?>" alt="Foto Produk" class="img-thumbnail" style="width: 150px; height: auto;">
                                    </div>
                                    <input type="file" class="form-control" id="foto" name="foto">
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