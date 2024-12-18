<?php
include 'functions.php';

$products = getTableData('produk');
$logos = getTableData('logo');
$promos = getPromoData('produk', 'promo = "iya"');
?>

<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/flosun/flosun/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:14 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Skyna Studio </title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- Header Area Start Here -->
    <header class="main-header-area">
    <div class="main-header header-transparent header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Logo Area -->
                <div class="col-6 col-md-4 col-lg-2 col-custom">
                    <div class="header-logo d-flex align-items-center">
                        <a href="index.php">
                            <img class="img-full" src="dashboard/uploads/<?= $logos[0]['foto'] ?>" alt="Header Logo">
                        </a>
                    </div>
                </div>

                <!-- Navigation Area -->
                <div class="col-6 col-md-8 col-lg-8 d-lg-flex justify-content-center col-custom">
                    <nav class="main-nav d-none d-lg-flex">
                        <ul class="nav">
                            <li>
                                <a class="active" href="index.php">
                                    <span class="menu-text">Home</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="menu-text">About Us</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-submenu dropdown-hover">
                                    <li><a href="https://www.instagram.com/skyna.studio?igsh=cTN6enJqb3pmZHY=">Instagram</a></li>
                                    <li><a href="https://www.tiktok.com/@skyna.studio?_t=8rsmSWkmper&_r=1">Tiktok</a></li>
                                    <li><a href="dashboard/login.php">Admin</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <!-- Mobile Menu Toggle Button -->
                    <div class="mobile-menu-toggle d-lg-none">
                        <button id="mobile-menu-button" class="btn">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu d-lg-none">
        <ul class="nav flex-column">
            <li><a href="index.php">Home</a></li>
            <li>
                <a>About Us</a>
                <ul>
                    <li><a href="https://www.instagram.com/skyna.studio?igsh=cTN6enJqb3pmZHY=">Instagram</a></li>
                    <li><a href="https://www.tiktok.com/@skyna.studio?_t=8rsmSWkmper&_r=1">Tiktok</a></li>
                    <li><a href="dashboard/login.php">Admin</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>

    <!-- Header Area End Here -->
    <!-- Slider/Intro Section Start -->
    <div class="intro11-slider-wrap section">
        <div class="intro11-slider swiper-container">
            <div class="swiper-wrapper">
                
                                
            </div>
            <!-- Slider Navigation -->
            <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
            <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
            <!-- Slider pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <script>
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
    });
</script>

    <!-- Slider/Intro Section End -->
    <!--Categories Area Start-->

    <style>
        

        /* Default Styles */
.main-header {
    background-color: #ffffff;
    padding: 10px 20px;
}

.main-nav .nav {
    display: flex;
    gap: 20px;
    list-style: none;
}

.main-nav .menu-text {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.mobile-menu {
    display: none;
    background: #f8f9fa;
    padding: 10px;
    position: absolute;
    top: 60px;
    left: 0;
    right: 0;
    z-index: 1000;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.mobile-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.mobile-menu ul li {
    margin: 10px 0;
}

.mobile-menu ul li a {
    color: #333;
    text-decoration: none;
    font-size: 14px;
}

/* Mobile-Specific Styles */
@media (max-width: 992px) {
    .main-nav {
        display: none;
    }

    .mobile-menu-toggle {
        display: block;
        text-align: right;
    }
}

        .buttonpesan {
        width: 17%;
        background: linear-gradient(to right, #ff9a9e, #fecfef);
        border: none;
        padding: 10px;
        border-radius: 5px;
        font-size: 16px;
        color: white;
        cursor: pointer;
        font-weight: bold;
        transition: background 0.3s ease;
        text-align: center;
    }

    /* Responsiveness for mobile devices */
    @media (max-width: 768px) {
        .buttonpesan {
            width: 50%; /* Make the button width larger on smaller screens */
            padding: 15px;
            font-size: 14px; /* Adjust font size */
        }
    }

    @media (max-width: 480px) {
        .buttonpesan {
            width: 80%; /* Almost full width for very small screens */
            padding: 12px;
            font-size: 12px; /* Further reduce font size */
        }
    }

    .main-nav .nav li a {
        font-size: 18px;
        padding: 10px 20px;
        text-align: center;
    }

    /* Responsiveness for tablets and smaller screens */
    @media (max-width: 768px) {
        .main-nav .nav li a {
            font-size: 16px; /* Slightly smaller text for tablets */
            padding: 8px 15px; /* Adjust padding for better spacing */
        }
    }

    /* Responsiveness for mobile devices */
    @media (max-width: 480px) {
        .main-nav .nav li a {
            font-size: 14px; /* Smaller font size for mobile */
            padding: 6px 12px; /* Adjust padding for mobile */
            text-align: center; /* Ensure the text is centered */
        }

        .main-nav {
            text-align: center; /* Center the entire navigation on mobile */
            display: block; /* Stack the navigation links */
        }

        .main-nav .nav {
            display: block; /* Stack the list items vertically */
            padding: 0;
            margin: 0;
        }

        .main-nav .nav li {
            margin: 10px 0; /* Add space between items */
        }
    }
    </style>
    <!--Categories Area End-->
    <!--Product Area Start-->
    <div class="product-area mt-text-2">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30"><br><br>
                        <span class="section-title-1">Hadiah yang luar biasa</span><br><br>
                        <h3 class="section-title-3">Produk Kami</h3>
                        <a class="buttonpesan" href="pesanproduk.php"><button>Belanja Sekarang</button></a>

                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                            <?php foreach ($products as $product) : ?>
                                <div class="single-item swiper-slide">
                                    <!--Single Product Start-->
                                    <div class="single-product position-relative mb-30">
                                        <div class="product-image">
                                            <a class="d-block" href="product-details.html">
                                                <img src="dashboard/uploads/<?= $product['foto'] ?>" alt="" class="product-image-1 w-100">
                                            </a>
                                            <!-- <span class="onsale">Sale!</span> -->
                                            <div class="add-action d-flex flex-column position-absolute">
                                        
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title">
                                                <h4 class="title-2"> <a href="product-details.html"><?= $product['nama_produk']; ?></a></h4>
                                            </div>
                                            
                                            <div class="price-box">
                                                <span class="regular-price">Rp <?= number_format($product['harga'] - ($product['harga'] * ($product['diskon'] / 100)), 0, ',', '.') ?></span>
                                                <span class="old-price"><del><?php echo ($product['diskon'] >= 1) ? 'Rp ' . number_format($product['harga'], 0, ',', '.') : ''; ?>
                                                    </del></span>
                                            </div>
                                            <a href="pesanproduk.php" class="btn product-cart">Pesan Via Whatsapp</a>
                                        </div>
                                    </div>
                                    <!--Single Product End-->
                                    
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination default-pagination"></div>
                    </div>
                </div>
            </div>
            <!--Product Area End-->
            <!-- Product Countdown Area Start Here -->
            <div class="product-countdown-area mt-text-3">
                <div class="container custom-area">
                    <div class="row">
                        <!--Section Title Start-->
                        <div class="col-12 col-custom">
                            <div class="section-title text-center mb-30">
                                <h3 class="section-title-3">Promo Hari ini</h3>
                                <a class="buttonpesan" href="pesan.php"><button>Belanja Sekarang</button></a>
                            </div>

                        </div>
                        <!--Section Title End-->
                    </div>
                    <div class="row">
                        <!--Countdown Start-->
                        <div class="col-12 col-custom">

                        </div>
                        <!--Countdown End-->
                    </div>
                    <div class="row product-row">
                        <div class="col-12 col-custom">
                            <div class="item-carousel-2 swiper-container anime-element-multi product-area">
                                <div class="swiper-wrapper">
                                    <?php foreach ($promos as $promo) : ?>
                                        <div class="single-item swiper-slide">
                                            <!--Single Product Start-->
                                            <div class="single-product position-relative mb-30">
                                                <div class="product-image">
                                                    <a class="d-block" href="product-details.html">
                                                        <img src="dashboard/uploads/<?= $promo['foto'] ?>" alt="" class="product-image-1 w-100">
                                                        <img src="dashboard/uploads/<?= $promo['foto'] ?>" alt="" class="product-image-2 position-absolute w-100">
                                                    </a>
                                                    <span class="onsale">Sale!</span>
                                                    <div class="add-action d-flex flex-column position-absolute">
                                                        <a href="compare.html" title="Compare">
                                                            <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                                        </a>
                                                        <a href="wishlist.html" title="Add To Wishlist">
                                                            <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                                        </a>
                                                        <a href="#exampleModalCenter" title="Quick View" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                            <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <div class="product-title">
                                                        <h4 class="title-2"> <a href="product-details.html"><?= $promo['nama_produk']; ?></a></h4>
                                                    </div>
                                                    <div class="kategori">
                                                        <h5>Kategori : <?= $product['kategori']; ?></h5>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="regular-price">Rp <?= number_format($product['harga'] - ($product['harga'] * ($product['diskon'] / 100)), 0, ',', '.') ?></span>
                                                        <span class="old-price"><del><?php echo ($product['diskon'] >= 1) ? 'Rp ' . number_format($product['harga'], 0, ',', '.') : ''; ?>
                                                            </del></span>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;; ?>
                                </div>
                                <!-- Slider pagination -->
                                <div class="swiper-pagination default-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Countdown Area End Here -->
            <!-- History Area Start Here -->

            <!-- Slider Navigation -->

        </div>
    </div>
    </div>
    <!-- Brand Logo Area End Here -->
    <!--Footer Area Start-->
    <footer class="footer-area">
        <div class="footer-widget-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <!-- Logo dan Deskripsi -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                        <div class="single-footer-widget m-0">
                            <div class="footer-logo">
                                <a href="index.php">
                                    <img src="dashboard/uploads/<?= $logos[0]['foto'] ?>" alt="Logo Image">
                                </a>
                            </div>
                            <p class="desc-content">Kami sangat senang dapat melayani anda.</p>
                            <div class="social-links">
                                <ul class="d-flex">
                                    <li>
                                        <a class="rounded-circle" href="#" title="WhatsApp">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="rounded-circle" href="https://www.instagram.com/skyna.studio?igsh=cTN6enJqb3pmZHY=" title="Instagram">
                                            <i class="fa fa-instagram"></i>
                                        </a>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Kontak -->
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                        <div class="single-footer-widget">
                            <h2 class="widget-title">Lihat Informasi</h2>
                            <div class="widget-body">
                                <address>
                                    Padang.<br>
                                    Phone: 0822 <br>
                                    Email: <a href="mailto:tokobunga@gmail.com">-</a>
                                </address>
                            </div>
                        </div>
                    </div>

                    <!-- Foto Tambahan dengan Ukuran Lebih Besar -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-custom">
                        <div class="single-footer-widget text-center">
                            <img src="assets/images/logo/skyna 2 remove.png" alt="Informasi Gambar" style="width: 90%; height: auto; border-radius: 15px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="footer-copyright-area">
        <div class="container custom-area">
            <div class="row">
                <div class="col-12 text-center col-custom">
                    <div class="copyright-content">
                        <p>Copyright © 2024 Skyna Studio</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!--Footer Area End-->

    <!-- Modal -->


    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <!-- JS
    ============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery Migrate JS -->
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Swiper Slider JS -->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- Ajaxchimpt js -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Ui js -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Jquery Countdown js -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>


</body>


<!-- Mirrored from htmldemo.net/flosun/flosun/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:14 GMT -->

</html>