<?php



$logos = getTableData('logo');

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
    </body>
    </html>