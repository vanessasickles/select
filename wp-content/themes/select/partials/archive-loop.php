<?php 
    $query_name = new WP_Query($args);
    if ( $query_name->have_posts() ) :
        while ($query_name -> have_posts()) : $query_name -> the_post(); ?>
            <?php get_template_part('partials/archive-item') ?>     
        <?php endwhile; ?>
    <?php endif;

    if (is_archive() or is_home()) : ?>
        <div class="pagination">
            <?php echo paginate_links(array(
                'prev_text' => __('«'),
                'next_text' => __('»'),
            )) ?>
        </div>
    <?php endif;
    wp_reset_postdata();
?>