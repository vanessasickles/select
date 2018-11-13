<div class="post-tile-container <?php 
    $post_id = get_the_ID();
    $post_categories = wp_get_post_categories($post_id, array('fields' => 'names'));

    if(in_array("Analysis", $post_categories) || in_array("Feature", $post_categories)): {
        echo 'large-tile';
    } else: {
        echo 'small-tile';
    }
    endif;
    ?>">

    <div class="post-tile">
        <a class="post-link" href="<?php echo get_permalink() ?>"></a>
        <?php the_post_thumbnail($post_id) ?>
        <div class="vignette"></div>
        <div class="tile-title">
            <div class="tile-info">
                <a href="<?php echo get_permalink() ?>"><h3><?php the_title(); ?></h3></a>
                <?php the_category() ?>
            </div>
            <a class="tile-read-more" href="<?php echo get_permalink() ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.svg"></a>
        </div>
    </div>
    
</div>