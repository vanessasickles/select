<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="#ffb300"/>

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

<body>
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
        </div>
    </nav>