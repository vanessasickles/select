<span class="single-emphasis">Want more? Check out:</span>
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

    $the_query = new WP_Query($args);

    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post(); ?>
            <?php $post_id = get_the_ID();  ?>
            
            <div class="related-post post-tile">

                <a href="<?php echo get_the_permalink($post_id) ?>" class="post-link"></a>

                <div class="tile-title">
                    <h3><?php echo the_title() ?></h3>
                </div>

                <?php $post_id = get_the_ID();
                    $featured_image = get_the_post_thumbnail($post_id, 'medium'); ?>

                <div class="related-post-thumbnail fit-img">
                    <?php echo $featured_image ?>
                    <div class="vignette"></div>
                </div>
                
            </div>
        <?php } wp_reset_postdata();
    } ?>
</div>