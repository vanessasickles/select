<div class="archive-item">
    <div class="item-thumbnail">
        <a href="<?php echo get_permalink() ?>">
            <?php the_post_thumbnail('archive-thumb') ?>
        </a>
    </div>
    <div class="item-content">
        <a href="<?php echo get_permalink() ?>"><h3><?php the_title(); ?></h3></a>
        <div class="item-byline">
            <span>by <a href="<?php the_author_link() ?>"><?php the_author() ?></a></span>
            <span><?php the_date() ?></span>
        </div>

        <div class="item-excerpt">
            <?php 
                $content = get_the_content();
                echo wp_trim_words( $content , '70' );  
            ?>
        </div> 

        <div class="item-readmore">
            <a class="text-link" href="<?php the_permalink()?>">read more</a>
        </div>
    </div>
</div>