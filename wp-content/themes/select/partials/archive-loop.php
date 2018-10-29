<?php 
    $query_name = new WP_Query($args);
    if(is_archive()) :
        if ( have_posts() ) :
            while ( have_posts()) : the_post(); ?>
                <?php get_template_part('partials/archive-item') ?>     
            <?php endwhile;
        endif;
        wp_reset_postdata(); ?>

        <div class="pagination">
            <?php echo paginate_links(array(
                'prev_text' => __('«'),
                'next_text' => __('»'),
            )) ?>
        </div>
    <?php else:
        if ( $query_name->have_posts() ) :
            while ($query_name -> have_posts()) : $query_name -> the_post(); ?>
                <?php get_template_part('partials/archive-item') ?>     
            <?php endwhile; ?>
        <?php endif;
        wp_reset_postdata();
        wp_reset_query();
    endif;
?>