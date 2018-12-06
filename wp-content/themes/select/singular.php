<?php get_header(); ?>

    <?php 
        $post_id = get_the_ID();
        $featured_image = get_the_post_thumbnail($post_id, 'full');
    ?>

    <div class="main">
        <div class="header-image">
            <?php if(has_post_thumbnail()) { 
                echo $featured_image;
            }; ?> 

            <div class="tile-title">
                <div class="container">
                    <h1><?php the_title() ?></h1>

                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php if(is_page()) { ?>
                        <?php } else { ?>
                            <div class="item-byline">
                                <span>by <a href="<?php get_the_author_meta('user_url') ?>"><?php the_author() ?></a></span>
                                <span><?php the_date() ?></span>
                            </div>
                        <?php } endwhile; endif; ?>
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
            include(locate_template( 'partials/author-blurb.php', get_post_format() )); 
            include(locate_template( 'partials/share-article.php', get_post_format() ));
            include(locate_template( 'partials/related-posts.php', get_post_format() ));
            
        };?>
        
        </div>
    </div>

<?php get_footer(); ?>