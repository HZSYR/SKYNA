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
    <title>Promo Hari Ini - Skyna Studio</title>
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
       .promo-section {
    text-align: center;
    margin-bottom: 30px; /* Reduced margin */
}

.promo-section .product-content {
    max-width: 180px; /* Reduce max width for product content */
    margin: 0 auto;
}

.product-image img {
    width: 80%; /* Scale down the product image */
    max-width: 200px; /* Limit the max image size */
    height: auto; /* Maintain aspect ratio */
}

.product-title h4 {
    font-size: 14px; /* Reduce font size */
    line-height: 1.4;
}

.price-box .regular-price {
    font-size: 14px; /* Reduce font size */
}

.swiper-container {
    padding: 0 15px; /* Add padding to prevent products from stretching too far */
}

.swiper-slide {
    width: auto !important; /* Allow the slides to shrink */
    max-width: 220px; /* Limit the width of each item */
}
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
    </style>
</head>
<body>
    <!-- Header Start -->
    <?php include 'header.php'; ?>
    <!-- Header End -->

    <!-- Promo Section Start -->
    <div class="product-countdown-area mt-text-3 promo-section">
        <div class="container custom-area">
            <div class="row">
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <h3 class="section-title-3">Promo Hari Ini</h3>
                     
                    </div>
                </div>
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="item-carousel-2 swiper-container anime-element-multi product-area">
                        <div class="swiper-wrapper">
                            <?php foreach ($promos as $promo) : ?>
                                <div class="single-item swiper-slide">
                                    <div class="single-product position-relative mb-30">
                                        <div class="product-image">
                                            <a class="d-block" href="">
                                                <img src="dashboard/uploads/<?= $promo['foto'] ?>" alt="" class="product-image-1 w-100">
                                            </a>
                                            <span class="onsale">Sale!</span>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"><a href=""><?= $promo['nama_produk']; ?></a></h4>
                                            </div>
                                           
                                            <div class="price-box">
                                                <span class="regular-price">Rp <?= number_format($promo['harga'] - ($promo['harga'] * ($promo['diskon'] / 100)), 0, ',', '.') ?></span>
                                                <span class="old-price"><del><?= ($promo['diskon'] >= 1) ? 'Rp ' . number_format($promo['harga'], 0, ',', '.') : ''; ?></del></span>
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Promo Section End -->

    <!-- Form Section Start -->
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
</html>