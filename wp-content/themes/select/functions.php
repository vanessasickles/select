<?php 
// Menu Theme Support
add_theme_support( 'menus' );

// Featured Image Theme Support
add_theme_support( 'post-thumbnails' );

// Creates Image Sizes
add_image_size( 'review-slide', 300, 250, true );
add_image_size( 'archive-thumb', 300, 175, true );


// Register main navigation menus
register_nav_menu('main_navigation', 'Main Navigation');
register_nav_menu('footer_menu', 'Footer Menu');

// Enqueue main scripts
function main_scripts() {
	wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/styles/main.css' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'master', get_template_directory_uri() . '/assets/js/master.js' );

}

function swiper_scripts() {
	wp_enqueue_style( 'swipercss', get_template_directory_uri() . '/assets/swiper/dist/css/swiper.min.css' );
	wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/assets/swiper/dist/js/swiper.js');
	wp_enqueue_script( 'myswiperjs', get_template_directory_uri() . '/assets/js/swiper.js', '','', true);
}

add_action( 'wp_enqueue_scripts', 'swiper_scripts' );
add_action( 'wp_enqueue_scripts', 'main_scripts' );

// Changes the [...] default readmore
function excerpt_more( $more ) {
    return '…';
}
add_filter( 'excerpt_more', 'excerpt_more' );
?>