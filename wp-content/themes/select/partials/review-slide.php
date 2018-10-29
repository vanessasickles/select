<div class="swiper-slide">
    <?php 
        $post_object = get_sub_field('post');
        $post = $post_object;
        setup_postdata( $post );
        $post_id = get_the_ID(); 
    ?>
    <div class="flex flex-col items-center justify-center">
        <a href="<?php echo get_permalink() ?>">
            <?php the_post_thumbnail('review-slide') ?>
            <a class="tile-title" href="<?php echo get_permalink() ?>"><?php the_title(); ?></a>
        </a>
    </div>

    <?php wp_reset_postdata(); ?>
</div>