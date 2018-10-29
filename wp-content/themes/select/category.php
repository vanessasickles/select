<?php get_header(); ?>

<div class="main">
    <div class="container">
        <div class="tile-roll">
            <?php 
            var_dump(get_field_objects());
                get_template_part( 'partials/tile-loop', get_post_format() );
            ?>
        </div>
        <div class="secondary-content">
            <div class="archive header-bar">
                <h1><?php echo wp_title(''); ?> articles</h1>
            </div>
            <?php
                $args = array('cat' => $cat );
                $category_posts = $query_name;

                include(locate_template( 'partials/archive-loop.php', get_post_format() )); 
            ?>
        </div>
    </div>
</div> 

<?php get_footer(); ?>