<?php get_header(); ?>

<div class="main">
    <div class="container archive-container">
        <div class="tile-roll">
            <?php 
                $sticky = get_option( 'sticky_posts' );
                $args = array(
                    'cat' => $cat,
                    'post__in' => $sticky,
                    'ignore_sticky_posts' => 1,
                    'p' => $sticky,
                );
                $sticky_posts = $query_name;
                include(locate_template( 'partials/tile-loop.php', get_post_format() ));
            ?>
        </div>
        <div class="secondary-content">
            <div class="archive header-bar">
                <h1><?php echo wp_title(''); ?> articles</h1>
            </div>
            <?php
                $args = array(
                    'cat' => $cat,
                    'post__not_in' => $sticky,
                    'ignore_sticky_posts' => 1,
                );
                $category_posts = $query_name;

                include(locate_template( 'partials/archive-loop.php', get_post_format() )); 
            ?>
        </div>
    </div>
</div> 

<?php get_footer(); ?>