<?php get_header(); ?>

    <?php 
        $post_id = get_the_ID();
        $featured_image = get_the_post_thumbnail($post_id, 'full');
    ?>

    <div class="main">
        <div class="header-image">
            <?php echo $featured_image ?>

            <div class="tile-title">
                <div class="container">
                    <h1><?php the_title() ?></h1>

                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="item-byline">
                            <span>by <a href="<?php the_author_link() ?>"><?php the_author() ?></a></span>
                            <span><?php the_date() ?></span>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>

        <div class="container">
            <?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile; endif; 
			?>
        </div>

        <div class="author-blurb">
            <div class="container">
                <?php $author_id=$post->post_author; ?>
                <a class="author-avatar" href="<?php the_author_link() ?>">
                    <?php echo get_avatar($author_id, 'thumbnail'); ?>
                </a>
                <div class="author-info">
                    <div class="author-details">
                        <div class="author-container">

                            <a class="author-nickname" href="<?php the_author_link() ?>"><?php echo get_the_author_meta('nickname') ?></a>

                            <?php $author_id = get_the_author_meta('ID'); ?>

                            <?php if(get_field('twitter', 'user_'.$author_id)) { ?>
                                <a class="twitter-icon" href="<?php the_field('twitter', 'user_'.$author_id) ?>">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            <?php }; ?>

                            <?php if(get_field('instagram', 'user_'.$author_id)) { ?>
                                <a class="instagram-icon" href="<?php the_field('instagram', 'user_'.$author_id) ?>">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            <?php }; ?>

                            <?php if(get_the_author_meta('user_email')) { ?>
                                <a class="email-icon" href="mailto:<?php echo get_the_author_meta('user_email') ?>">
                                    <i class="far fa-envelope"></i>
                                </a>
                            <?php }; ?>
                        </div>
                    </div>

                    <p class="author-bio">
                        <?php echo get_the_author_meta('description') ?>
                    </p>
                </div>

            </div>
        </div>

        <div class="container share-article">
            <span class="single-emphasis">Enjoy this article? Share it:</span>
            <div class="share-icons">
                <a href="<?php echo get_permalink() ?>"><i class="fas fa-link"></i></a> 
                <a class="email-icon" href="mailto:<?php echo get_the_author_meta('user_email') ?>"><i class="far fa-envelope"></i></a> 
                <a class="email-icon" href="mailto:<?php echo get_the_author_meta('user_email') ?>"><i class="fab fa-facebook"></i></a> 
                <a class="email-icon" href="mailto:<?php echo get_the_author_meta('user_email') ?>"><i class="fab fa-twitter"></i></a>
            </div>

            <span class="single-emphasis">Want more? Check out:</span>
        </div>

        <div class="related-posts">
            <?php 
                $post_id = get_the_ID();
                $category = get_the_category($post_id);
                $category_id = $category[0]->cat_ID;

                $args = array(
                    'cat' => $category_id,
                    'post__not_in' => array($post_id),
                    'posts_per_page' => '2',
                );

                $the_query = new WP_Query( $args );

                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();?>
                        
                        <div class="related-post post-tile">
                            <a href="<?php get_permalink() ?>" class="post-link"></a>
                            <div class="tile-title">
                                <h3><?php the_title() ?></h3>
                            </div>
                            <?php 
                                $post_id = get_the_ID(); 
                                $featured_image = get_the_post_thumbnail($post_id, 'medium');
                            ?>
                            <div class="related-post-thumbnail fit-img">
                                <?php echo $featured_image ?>
                                <div class="vignette"></div>
                            </div>
                        </div>

                    <?php }
                    wp_reset_postdata();
                } ?>
        </div>

    </div>
    
<?php get_footer(); ?>