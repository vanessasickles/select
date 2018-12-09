    <footer>
        <div class="container footer-con">
            <div class="footer-col-3">
                <div class="footer-info">
                    <div class="logo">
                        <a href="<?php echo site_url() ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-light-tagline.svg" alt="Select Logo">
                        </a>
                    </div>

                    <p>© 2018 Select, All rights reserved.</p>
                    <a href="http://localhost:8888/privacy-policy/">Privacy Policy</a>
                </div>
            </div>

            <div class="footer-col-3 flex flex-col items-center">
                <div>
                    <?php wp_nav_menu(array( 'theme_location' => 'footer_menu' ));?>
                </div>
            </div>

            <div class="footer-col-3 flex justify-center">
                <div class="social-media">
                    <h4>Connect with Us</h4>
                    <a href="<?php echo site_url() ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/twitter-logo.png" alt="Twitter Logo">
                    </a>
                    <a href="<?php echo site_url() ?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/instagram.png" alt="Instagram Logo">
                    </a>
                </div>
            </div>
        </div>


    <?php wp_footer(); ?>
    </footer>

</body>