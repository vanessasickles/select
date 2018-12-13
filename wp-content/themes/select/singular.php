<?php get_header(); ?>

    <?php 
        $post_id = get_the_ID();
        $featured_image = get_the_post_thumbnail($post_id, 'full');
    ?>

    <div class="main">
        <div class="header-image fit-img">
            <?php if(has_post_thumbnail()) { 
                echo $featured_image;
            } else { ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/default-image.png">
            <?php } ?> 

            <div class="tile-title">
                <div class="container">
                    <h1><?php the_title() ?></h1>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php if(is_page()) { ?>
                        <?php } else {
                            get_template_part('partials/item-byline', get_post_format());
                        } endwhile; endif; ?>
                    </div>
                </div>
            </div>
        <?php ?>

        <div class="container">
            <?php 
                if (have_posts()) : while (have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                endwhile; endif;
            ?>
        </div>

        <?php if(is_page()) { ?>
        <?php } else { 
            get_template_part( 'partials/author-blurb', get_post_format() ); 
            get_template_part( 'partials/share-article', get_post_format() );
            get_template_part( 'partials/related-posts', get_post_format() );
            
        };?>
        
        </div>
    </div>

<?php get_footer(); ?>