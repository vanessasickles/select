<?php 
    $query_name = new WP_Query($args);
    while ($query_name -> have_posts()) : $query_name -> the_post(); ?>
        <?php 
            $post_id = get_the_ID();
            $post_categories = wp_get_post_categories($post_id, array('fields' => 'names'));
        ?>
        <div class="sidebar-article">
            <a href="<?php echo get_permalink() ?>"><h3><?php the_title(); ?></h3></a>
            <a class="text-link" href="<?php echo get_permalink() ?>">read more</a>
        </div>
    <?php 
    endwhile;
    wp_reset_postdata();
    wp_reset_query()
?>