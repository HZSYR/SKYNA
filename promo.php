<?php
include 'functions.php';
// Ambil data promo

?>
<div class="product-countdown-area mt-text-3">
                <div class="container custom-area">
                    <div class="row">
                        <!--Section Title Start-->
                        <div class="col-12 col-custom">
                            <div class="section-title text-center mb-30">
                                <h3 class="section-title-3">Promo Hari ini</h3>                                
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
                                                    <a href="https://wa.me/6282288985217?text=Halo%2C%20saya%20ingin%20bertanya" target="_blank" class="btn product-cart">Pesan Via WhatsApp</a>
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