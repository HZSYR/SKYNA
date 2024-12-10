<?php
include 'functions.php';
$products = getTableData('produk');
$logos = getTableData('logo');
$promos = getPromoData('produk', 'promo = "iya"');
// Ambil data promo
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Produk Kami - Skyna Studio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <style>
          .form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form input, .form textarea, .form button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            font-size: 14px;
        }
        .form button {
            background-color: #fed0D9;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form button:hover {
            color: #000000;
        }

        .product-image img {
    width: 100%; /* Pastikan gambar mengisi container */
    max-width: 150px; /* Batasi lebar maksimal gambar */
    height: auto; /* Pertahankan rasio aspek gambar */
    margin: 0 auto; /* Pusatkan gambar di dalam kontainer */
    object-fit: cover; /* Sesuaikan gambar tanpa merusak proporsi */
}

.single-item {
    max-width: 180px; /* Sesuaikan ukuran kontainer item produk */
    margin: 5px; /* Kurangi jarak antar produk */
    display: inline-block; /* Pastikan elemen dalam satu baris */
    text-align: center; /* Pusatkan konten produk */
}

.product-content h4 {
    font-size: 14px; /* Perkecil ukuran teks judul */
}

.price-box {
    font-size: 12px; /* Perkecil ukuran teks harga */
}

    </style>
    </head>
    <body>
    <?php include 'header.php'; ?>

    <div class="product-area mt-text-2">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">Hadiah yang luar biasa</span><br><br>
                        <h3 class="section-title-3">Produk Kami</h3>

                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            <?php foreach ($products as $product) : ?>
                                <div class="single-item swiper-slide">
                                    <!--Single Product Start-->
                                    <div class="single-product position-relative mb-30">
                                        <div class="product-image">
                                            <a class="d-block" href="#">
                                                <img src="dashboard/uploads/<?= $product['foto'] ?>" alt="" class="product-image-1 w-100">
                                            </a>
                                            <!-- <span class="onsale">Sale!</span> -->
                                            <div class="add-action d-flex flex-column position-absolute">
                                        
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"> <a href="#"><?= $product['nama_produk']; ?></a></h4>
                                            </div>
                                            <!-- <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div> -->
                                            <div class="price-box">
                                                <span class="regular-price">Rp <?= number_format($product['harga'] - ($product['harga'] * ($product['diskon'] / 100)), 0, ',', '.') ?></span>
                                                <span class="old-price"><del><?php echo ($product['diskon'] >= 1) ? 'Rp ' . number_format($product['harga'], 0, ',', '.') : ''; ?>
                                                    </del></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!--Single Product End-->
                                    
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
    <div class="form">
        <form id="whatsappForm" onsubmit="sendToWhatsApp(event)">
            <label for="name">Nama:</label><br>
            <input type="text" id="name" name="name" required><br><br>

            <label for="address">Alamat:</label><br>
            <input type="text" id="address" name="address" required><br><br>

            <label for="phone">Nomor HP:</label><br>
            <input type="text" id="phone" name="phone" required><br><br>

            <label for="product">Nama Barang dan Warna:</label><br>
            <input type="text" id="product" name="product" required><br><br>

            <label for="message">Request:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br><br>

            <button class="kirim" type="submit">Kirim ke WhatsApp</button>
        </form>

        <script>
            function sendToWhatsApp(event) {
                event.preventDefault();

                // Ambil data dari form
                const name = document.getElementById('name').value;
                const address = document.getElementById('address').value;
                const phone = document.getElementById('phone').value;
                const product = document.getElementById('product').value;
                const message = document.getElementById('message').value;

                // Nomor WhatsApp tujuan (gunakan format internasional tanpa tanda +)
                const waNumber = "6282288985217"; // Ganti dengan nomor tujuan

                // Encode pesan agar URL aman
                const waMessage = `Halo, nama saya ${encodeURIComponent(name)}. \nAlamat: ${encodeURIComponent(address)}. \nNomor HP: ${encodeURIComponent(phone)}. \nBarang: ${encodeURIComponent(product)}. \nRequest: ${encodeURIComponent(message)}`;

                // Redirect ke URL WhatsApp
                const waURL = `https://wa.me/${waNumber}?text=${waMessage}`;
                window.open(waURL, '_blank');
            }
        </script>
    </div>
    <!-- Form Section End -->

    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
    <!-- Footer End -->

    <!-- JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    </body>