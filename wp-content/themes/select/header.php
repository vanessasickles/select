<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#ffb300"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
      <?php echo get_bloginfo( 'name' );
        if(!is_front_page()):
            echo wp_title();
        endif;
      ?>
    </title>
    <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
    <meta name="author" content="Vanessa Sickles">

  <?php wp_head(); ?>
  

</head>
<?php
$featured_bg_id = get_the_ID();
$featured_bg = get_the_post_thumbnail_url($featured_bg_id, 'full');?>

<body class="<?php 
    echo (is_page_template('page-quiz.php') ? 'featured-bg' : 'default-bg')
?>"
style="<?php
    echo (is_page_template('page-quiz.php') ? 'background-image:url(' . $featured_bg .')' : '')
?>">
    <nav>
        <div class="container">
            <div class="logo">
                <a href="<?php echo site_url() ?>">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="Select Logo">
                </a>
            </div>
            <div class="main-nav">
                <?php wp_nav_menu(array( 'theme_location' => 'main_navigation' )) ?>
            </div>

            <button class="nav-expand hamburger hamburger--spring" type="button">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </nav>