
<?php
$logos = getTableData('logo');
?><footer class="footer-area">
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