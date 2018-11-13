<?php
    $query_name = new WP_Query($args);
    if ( $query_name->have_posts() ) :
        while ($query_name -> have_posts()) : $query_name -> the_post(); ?>
            <?php get_template_part('partials/tile-item') ?>     
        <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();
?>